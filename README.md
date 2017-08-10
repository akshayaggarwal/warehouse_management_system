# warehouse_management_system
 

An attempt to implement communicator between ERP (Enterprise Resource Planning) and WMS (Warehouse Management System) is made. For the system implementation we used different components of Microsoft development tools. Microsoft Azure platform is used to implement MySQL database. Microsoft's chatbot framework LUIS (Language Understanding Intelligent Services) was used to implement machine learning algorithm to map data coming from different users to a common warehouse format. Python scripts are used to supply client demands onto the WMS system. Interactive front end is developed using PHP and jQuery.

2. System Design

The Client supplies the data to the black box in different formats. The black box, which acts as a communicator translates this varied data into a uniform warehouse understandable format. The various steps involved in the functioning of the system involves:

1. The clients send the data to the black box in different forms via the text file. This text file in structured in a particular format helping Black Box to read it efficiently. 

2. After reading the data from client side, Black Box parses the text file into correct format segregating it into different fields of warehouse system database. 

3. Once the data is parsed, the blackbox checks the quantity of item client is requesting in the warehouse. If the number of items in the warehouse is less than the number of items requested, the user request is denied and the status is uploaded onto the user interface. Otherwise, if there is enough quantity, required number of items are deducted from warehouse and user request is approved.

4. If the client order is repeatedly rejected the shipper would be notified that that particular item is below the threshold and is needed to be refilled.

3. Innovative Design

The system design is highly automated and very innovative. The following points highlights some of the features of the system:

(i) The system provides client an immediate response of whether his/her request is approved or not.

(ii) The system uses Microsoft chatbot framework LUIS o implement machine learning algorithm. Using extensive data set, the chatbot is trained to map different forms of user data onto a single type of warehouse data. 

(iii) System uses Microsoft Azure framework to implement MySQL database. MySQL database is used to store different information about warehouse and client request.

(iv) System also uses Microsoft Azure web deployment tools to deploy the website for user interaction.

(v) System uses a secure login page to verify the identity of user and warehouse manager before they can view any internal information.

(vi) If user request is rejected, he can request to resolve the issue by notifying the supplier in real time.

(vii) System also include a real time graphical analysis of number of requests for different products since starting of the time.


