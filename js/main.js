// Function to load the contact form for adding a new contact.
// It sends an AJAX request to load_contact_form.php and displays the form in the "contact_details" div.
function contact_form(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Load received contact form HTML into "contact_details" div
            document.getElementById("contact_details").innerHTML=this.responseText;
        }
    };
    xmlhttp.open("POST", "./php/load_contact_form.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

// Function to load contact details into the contact form.
// It sends an AJAX request to load_contact_details.php with a contactId to fetch and display contact details.
function load_contact_details(contactId){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Display the fetched contact details in "contact_details" div
            document.getElementById("contact_details").innerHTML=this.responseText;
        }
    };
    xmlhttp.open("POST", "./php/load_contact_details.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Sending contactId as POST data
    xmlhttp.send("contactId=" + contactId);
}

// Function to save a new contact.
// It first validates the form and then sends an AJAX request to save_contact.php with the contact details.
function save_contact(){
    // Validate form before saving contact
    if (validateForm()==true){
        // Fetch values from form inputs
        var name = document.getElementById("txt_full_name").value;
        var email = document.getElementById("email_address").value;
        var phone = document.getElementById("txt_mobile_number").value;
        var address = document.getElementById("txt_address").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Show response from server (e.g., success message) and reload page
                alert(this.response);
                location.reload();
            }
        };
        xmlhttp.open("POST", "./php/save_contact.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // Sending contact details as POST data
        xmlhttp.send(                
            "name=" + name +"&"+ 
            "email=" + email +"&"+ 
            "phone=" + phone +"&"+ 
            "address=" + address
        );
    }
}

// Function to search for contacts.
// It sends an AJAX request to search_contacts.php with the search query and updates the contact list.
function search_contact(){
    var search_text = document.getElementById("txt_search").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Display the search results in "contact_list" div
            document.getElementById("contact_list").innerHTML=this.responseText;
        }
    };
    xmlhttp.open("POST", "./php/search_contacts.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Sending search query as POST data
    xmlhttp.send("name=" + search_text);
}

// Function to load all contacts.
// It sends an AJAX request to load_all_contacts.php and updates the contact list with all contacts.
function load_all_contacts(){
    // Clear search text
    var name = document.getElementById("txt_search").value = "";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Display all contacts in "contact_list" div
            document.getElementById("contact_list").innerHTML=this.responseText;
        }
    };
    xmlhttp.open("POST", "./php/load_all_contacts.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

// Function to update an existing contact.
// It first validates the form and then sends an AJAX request to update_contact.php with the contact details.
function update_contact(contactID){
    // Validate form before updating contact
    if (validateForm()==true){
        // Fetch updated values from form inputs
        var name = document.getElementById("txt_full_name").value;
        var email = document.getElementById("email_address").value;
        var phone = document.getElementById("txt_mobile_number").value;
        var address = document.getElementById("txt_address").value;
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Show response from server (success message) and refresh contact details
                alert(this.response);
                load_contact_details(contactID);
            }
        };
        xmlhttp.open("POST", "./php/update_contact.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // Sending updated contact details and contactID as POST data
        xmlhttp.send(     
            "contactID=" + contactID +"&"+            
            "name=" + name +"&"+ 
            "email=" + email +"&"+ 
            "phone=" + phone +"&"+ 
            "address=" + address
        );
    }
}

// Function to delete a contact.
// It sends an AJAX request to delete_contact.php with the contactId and reloads the page upon success.
function delete_contact(contactId){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Show response from server (success message) and reload page
            alert(this.response);
            location.reload();
        }
    };
    xmlhttp.open("POST", "./php/delete_contact.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Sending contactId as POST data for deletion
    xmlhttp.send("contactId=" + contactId);
}

// Utility function to enable form fields for updating.
function enable_fields(){
    document.getElementById("txt_full_name").disabled = false;
    document.getElementById("email_address").disabled = false;
    document.getElementById("txt_mobile_number").disabled = false;
    document.getElementById("txt_address").disabled = false;
    document.getElementById("btn_update").disabled = false;
    document.getElementById("btn_delete").disabled = false;
}

// Utility function to clear form fields.
function clear_fields(){
    document.getElementById("txt_full_name").value = "";
    document.getElementById("email_address").value = "";
    document.getElementById("txt_mobile_number").value = "";
    document.getElementById("txt_address").value = "";
}

// Function to handle the 'Back' action in UI.
// Clears the 'contact_details' div and shows a placeholder message.
function go_back(){
    document.getElementById('contact_details').innerHTML = '';

    // Display a placeholder message in 'contact_details' div
    document.getElementById('contact_details').innerHTML = "<div class='empty-note col'><img src='./assets/images/contact-book.png' alt='' ><h3>No contact selected</h3></div>";
}

// Function to validate form inputs according to specific criteria.
// Validates full name, mobile number, email address, and home address.
function validateForm() {
    var isValid = true;

    var fullName = document.getElementById("txt_full_name").value;
    var mobileNumber = document.getElementById("txt_mobile_number").value;
    var emailAddress = document.getElementById("email_address").value;
    var address = document.getElementById("txt_address").value;

    // Validate Full Name
    if(!/^[a-zA-Z0-9 ]*$/.test(fullName)) {
        alert("Full Name should only contain alphabetical letters, numbers, and spaces.");
        isValid = false;
    }
    // Validate Mobile Number
    if(!/^\d{9,10}$/.test(mobileNumber)) {
        alert("Mobile Number should only contain 9 or 10 digits.");
        isValid = false;
    }
    // Validate Email Address
    if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailAddress)) {
        alert("Please enter a valid email address.");
        isValid = false;
    }
    // Validate Home Address
    if(!/^[a-zA-Z0-9 :;.,-/]*$/.test(address)) {
        alert("Home Address should only contain alphabetical letters, numbers, colons, commas, semicolons, dots, and hyphens.");
        isValid = false;
    }

    // Return true if all validations passed, else false
    return isValid ? true : false;
}
