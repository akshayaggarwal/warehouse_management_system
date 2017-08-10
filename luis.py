import mysql.connector
import urllib2
import json
cnx = mysql.connector.connect(user='myadmin@wmshack', password='Usc@123456',
                              host='wmshack.mysql.database.azure.com',
                              database='house')
inputFile = open('t1.txt','r')
lines = inputFile.readlines()
inputFile.close()
d = {'KirklandWater':'1','smartwater':'2','ChipsAhoy':'3','saltines':'4'}
cursor = cnx.cursor()
for line in lines:
    new = line.strip().split('=')
try:
    for line in lines:
        line = line.strip().split(',')
        customer_id = line[0]
        customer_id = int(customer_id)
        item_name = line[1]
        item_name = item_name.replace(" ","%20")
        required_quantity = int(line[2])
        address = line[3]
        resultdata = 0
        data = urllib2.urlopen("https://westus.api.cognitive.microsoft.com/luis/v2.0/apps/f4558005-df76-436c-98eb-26beede3ff09?"
            "subscription-key=44aab7655e554226a38fa9f022bddad0&timezoneOffset=0&verbose=true&q=%s" %(item_name));
        values = json.load(data)
        data.close()
        idValue = values['topScoringIntent']['intent']
        item_no = d[idValue]
        if idValue == "None":
            resultdata = 3
        cursor.execute("""
                  select * from status where item_name = '%s' """ % (idValue))
        result = cursor.fetchall()
        available_quantity = int(result[0][4])
        if available_quantity > required_quantity:
            remaining = available_quantity - required_quantity
            cursor.execute("""UPDATE status SET quantity = %s WHERE item_name = %s """, (remaining, idValue))
            cnx.commit()
            resultdata = 1
        cursor.execute("INSERT INTO request (item_no, result, user_no, address) VALUES (%s,%s,%s,%s)",(item_no,resultdata,customer_id,address))
        cnx.commit()
except:
    cnx.rollback()
finally:
    cnx.close()
