#include <fstream>
#include <string>
#include <string>
#include <iostream>
#include <vector>
#include "mysql_connection.h"
#include "mysql_driver.h"

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>

using namespace std;
using std::vector;

int main() 
{ 
    std::ifstream file("input1.txt");
    std::string str,temp; 

    std::vector<string> myvec;    
    int old,found;

    old = 0;

    map<string,int> mymap;

    while (std::getline(file, str))
    {
        myvec.push_back(str);
	
	found = str.find_first_of('#');
	temp = str.substr(old,found);
	cout<<temp;

	str = str.substr(found+1,str.size());
	//cout<<"tep after "<<str;
	//old = found;

	found = str.find_first_of('#');
	temp = str.substr(old,found);
	cout<<temp;
	
	str = str.substr(found+1,str.size());

	//old = found;

	found = str.find_first_of('#');
	temp = str.substr(old,found);
	cout<<temp;
	//str = str.substr(found,str.size());
	cout<<endl;
    }


  sql::Driver *driver;
  sql::Connection *con;
  sql::Statement *stmt;
  sql::ResultSet *res;

  /* Create a connection */
  driver = get_driver_instance();
  con = driver->connect("localhost", "root", "akshay94");
  /* Connect to the MySQL test database */
  con->setSchema("wms");

  stmt = con->createStatement();
  res = stmt->executeQuery("SELECT * from status");
  while (res->next()) {
    cout << "\t... MySQL replies: ";
    /* Access column data by alias or column name */
    //cout << res->getString("id") << endl;
    cout << res->getString("item_name") << endl;
    cout << res->getInt("item_no") << endl;
    //cout << res->getString("id") << endl;

    //cout << "\t... MySQL says it again: ";
    /* Access column data by numeric offset, 1 is the first column */
    //cout << res->getString(1) << endl;
  }
  delete res;
  delete stmt;
  delete con;

  cout << endl; 
      

    return 0;
}
