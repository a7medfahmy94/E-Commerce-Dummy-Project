E-Commerce-Dummy-Project
========================
Cairo University 								Third Year
Faculty of Computers & Information 				  Fall 2014
Information Technology Department
Internet Technology Course
==================================
Project Specification

You will develop an e-commerce website that allows the customers to browse and purchase different products. The products may be books, laptops, cameras, mobiles, any electronic devices etc.
The website should provide two different views according to the type of the user as the user may be admin “store owner” or customer.
The customers will be able to register in your website, browse products, purchase any product, and track their orders.
The admin will be able to UPDATE Customer’s information, manage the store quantity of any product, and add products to shipping.

==================================
A) Customer Pages

1. Home Page

Customers can start shopping, track orders or change their information.
The page will contain links to the other pages, and a login box for customers.
You should validate the login and handle the error of an invalid username or password.

2. Products List Page

Customers can browse for the available products included in the website.
The product information will be extracted from the database.
The products list should include categories and sub-categories for the products.
The main category should be listed in a menu and the customer will click on any category to view the sub-categories.
The page will contain “view all products option”, it will view all products regardless of its category or subcategory.
When a customer selects a product for purchase, {the product id, quantity and customer id} will be passed to the shopping cart page to store the information.
Pull down menu with the quantity in stock will be viewed to avoid the problem of selecting too much quantity for purchase and it may be out of stock.


3. Signup Page

Customers can create an account in the website, they should provide specific information to the website to purchase products.
Sign up form will allow customers to write name, billing address, “optional” shipping address, phone, email, and password.
The customer will use the email address for the login instead of the username.
You should handle the error of the incomplete information.
You should handle the invalid format of the different inputs.
After successful sign up ‘complete & valid information’, customer’s information should be inserted into the database.


4. Customer’s Information Page

The customers can modify their personal information “included in the database”: { the name, address, phone number, and password}.
The email address can’t be modified because it is used as the username.
The new information provided by the customer should be updated in the database.
To avoid the problem of incomplete information, the page will view the customer information from the database as a default value. If the customer changes any field, it will be updated in the database otherwise nothing will be changed.

5. Shopping Cart Page

This page will include the products that the customer has chosen to purchase.
As mentioned before, when a customer selects a product for purchase,
{product id, quantity, customer id, and the time when adding the product} will be passed here. The provided information will be inserted into the database in the Order Processing table.
Order Processing table includes two flags,
processed flag: set to zero when adding new item
shipped flag: set to zero when adding new item
The flags values will be changed later in the checkout page.
At this point the customer will be able to drop products, increase/decrease quantities and continue shopping.
After an item is added to the cart it will remain for a period of time. After this time, if the processed flag of an item is zero, it will be deleted from the table.
You should handle the incomplete data passed from the products list page.

6. Checkout Page

The customer will be able to review shipping and billing information.
The customer can review the products they have chosen to purchase.
If the customer needs to make any change, it should be done on the shopping cart page.
After verifying the information, the customer should able to click purchase to any of the chosen products.
After clicking purchase button, the processed flag of this product should be updated to one and redirect the customer to successful transaction page “Just thank the customer for purchasing from your website and provide the transaction ID”.
You should handle the error of incomplete information.

7. Order Tracking Page

The customer will be able to follow shipments.
The customer will input a transaction ID.
Given the transaction ID, the page will provide all transaction information according to the database. {if the package was shipped, what date and who is the shipping company}.
You should handle the error of invalid transaction ID.


==================================

B) Admin Pages

1. Home Admin Page

The admin ‘store owner’ can modify inventory, and ship products.
This page will include links to those pages that can be accessed by the admin.
The admin should login before any access.
You should validate the login and handle the error of an invalid username or password.

2. Store Page

This page will provide all the products in the database.
The admin will be able to add new products, the page should allow the admin to add all required information.
The admin will be able to update quantities, change product’s names, descriptions, price, category and sub-category.
Updating the product’s information can be done by adding a list of the products, If the admin clicks on any product, another form will be viewed in another page that allow the admin to update the product’s information. Any update should be reflected on the database.
You should handle the error of invalid or incomplete information either in adding new products or even in updating the product’s information.

3. Customer Accounts Page

This page will allow the admin to update accounts if a customer calls or emails the admin with problems.
The admin can update any customer’s information except the email address.
Updating the customer’s information can be done by adding a list of the customers, If the admin clicks on any customer’s name, another form will be viewed in another page that allow the admin to update the customer’s information. Any update should be reflected on the database.
You should handle the error of invalid or incomplete information.

4. Shipping Page

This page will provide the orders need to be shipped. This will be viewed by selecting the transactions that have zero shipped flag.
The admin will set the shipped flag to one if the product is shipped then the admin will insert the tracking number and shipping company to the Order Processing table.
You should handle the invalid or incomplete information.

==================================
Database Tables:

Customer
Customer ID, First Name, Last Name, Billing Address, Billing City, Billing State, Billing Zip, Shipping Address, Shipping City, Shipping State, Shipping Zip, Phone, Email, and Password.

Admin
Username and Password.

Product
Product ID, Item Name, Item Description, Quantity In Stock, Price, Category, Sub-Category, Visible, and Picture.

Order Processing
Transaction ID, Customer ID, Product ID Number, Quantity, Date / Time, Processed, Shipped, Date Shipped, Tracking Number, and Shipping company.
