# Laravel-Capstone
Creating an eCommerce website, using a login, cart, session in my controllers. Also, demonstrating my knowledge for Model View Controllers


Capstone Deliverable #1
Securing your CMS/Adding missing features

. For this capstone, you will build upon your Laravel
project to create an online store.

Add “missing” functionality

o Add the picture upload field in the edit item form. If the field is blank (i.e. no new picture to
replace), do nothing to the existing picture. If the field isn’t blank, delete the old picture, move
the new picture into the images directory, and update the picture name in the database.
o Add delete functionality to the manage categories page but only show the delete button
when there are no items currently in that category. Also within the delete category method on
the controller, ensure that there are no items currently using the category before allowing the
DELETE query to execute.
o Delete the item image when deleting an item
o Add WYSIWYG editor to the item description on the add/edit item pages

Add user authentication
o Add user authentication to your app using laravel’s make auth feature. Modify your item and
category controllers to be accessible only to authenticated users. Also, modify your routes for
items and categories to be accessible only to authenticated users.

Capstone Deliverable #2
Web site design / Implement views / Image
resizing

Web Site Design
o Your product list page must have a minimum of 3 categories (links) in a vertical table at the
left of the page (which will be pulled from the database). Your product listing (table on right)
will display all products in the database. You must mock-up at least 2 rows of products. For
each product, you will display a thumbnail picture, the title of the item, the price and a “buy
now” button. When you click on either the thumbnail or title, you will be brought to the details
page where you will display a larger picture plus all other fields that are required to be stored
(title, product_id, description, price, quantity, sku).

Connect inventory system to design prototype
o Create a public controller and routes for your public store pages. Categories and items are
to be passed to the views and dynamically displayed. When a category link is followed, only
products in that category are to be displayed
Add image resizing into add item/check add item and edit item/check edit item
o After the image is moved into the images directory, resize the picture so that the thumbnail
matches the width in your mockup (prefix filename with tn_). Do a second resize so this one
matches the width in your product display mockup (prefix filename with lrg_).
o Use laravel’s image intervention to resize and save your images

Capstone Deliverable #3

Building the Shopping Cart
o To keep track of the shopper, you must use session variables to identify them. You will
create a session_id and determine their IP address and set them as a session variables
in your browser. If you cannot retrieve a session id and IP from the session variables,
you must set them up. This code should appear on every public page.
o When you press the “add to cart” button, you will insert the item_id, the session_id, IP
address, and quantity of 1 into a table called shopping_cart. You will then redirect to a
shopping cart page.
o On the shopping cart page, you will retrieve all items for that user and display the title,
quantity and price in a table. The only field that should be editable is the quantity field.
To the right of the listing is an update and remove buttons. When update is pressed, you
will call a route called update_cart. The quantity is updated in the associated controller
method (do not exceed item quantity in the database), and you are redirected back to
the shopping cart. When the remove button is pressed, you call the remove_item route,
delete the item from the shopping cart table in the associated controller method and
redirect back to the shopping cart
o At the bottom of the items, you should display the subtotal.

Capstone Deliverable #4

Create the Order Processing System
o Add customer information fields to the bottom of the shopping cart page (first name,
last name, phone, and email). When they click the submit order button at the bottom of
the form, they will call the check_order route where you will ensure that none of the
fields are empty and the email is properly formatted. If any field is empty (or email is
not proper), redisplay the form with the values the user entered. Display an error beside
any field that is in error (use parsleyJS). If the fields are ok, insert the user details (along
with the session values) in a table called order_info . Retrieve the order_id. Loop
through the cart and move each item into a table called items_sold which contains the
item_id, order_id, item_price, and quantity. Redirect to a thankyou page where you
will display a receipt for the order (list of items ordered, cost of order, customer details)
by retrieving the session_id and IP from the browser. At the end of script, unset the
session_id. Add code to the top of the page that redirects you to the product page if the
session_id is not set.
o Add a view orders page to the admin area. Display a list of completed orders. When the
link is pressed (or button beside it is pressed), display the customer receipt.
