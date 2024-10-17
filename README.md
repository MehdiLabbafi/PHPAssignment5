# PHPAssignment5
# Assignment 5


# Project 20-1: Use the Same Form for Adding and Updating Data

## Description

This project enhances the Manage Customers application so that it allows users to both add new customers and update existing ones using the same form.

## Features

| **Feature** | **Description** |
|-------------|-----------------|
| **Customer Search Page** | The search functionality works the same as in Project 6-3. Users can enter a last name in the search field, and a list of matching customers will be displayed. The page also includes an **Add Customer** button that redirects to the **Add/Update Customer** page for adding new customers. |
| **Add/Update Customer Page** | The page is used for both adding new customers and updating existing ones. |
| **Adding a New Customer** | When the user clicks on the **Add Customer** button, they are redirected to the **Add/Update Customer** page with blank fields. The default country in the drop-down list is **United States**. |
| **Updating an Existing Customer** | If a customer is selected from the search results, their information is pre-filled in the form fields. The **Update Customer** button allows updating the existing customer’s details. Validation messages are shown for required fields. |

## Operations

| **Operation** | **Description** |
|---------------|-----------------|
| **Adding a Customer** | When the user clicks the **Add Customer** button, they are redirected to the **Add/Update Customer** page with empty fields. After filling out the form, clicking **Add Customer** adds the new customer to the database. |
| **Updating a Customer** | If a user selects an existing customer, they will be taken to the **Add/Update Customer** page with the customer's details pre-filled. Clicking the **Update Customer** button updates the customer’s information. |

## Validation

| **Validation Rule** | **Description** |
|---------------------|-----------------|
| **Required Fields** | All required fields, such as first name, last name, address, and email, must be filled in. |
| **Phone Number Format** | The phone number must follow the format `(999) 999-9999`. |
| **Email** | The email must be a valid email address. |
| **Password** | The password must be at least 6 characters long. |

## Summary of Changes

| **Change** | **Description** |
|------------|-----------------|
| **Unified Form** | A single form is implemented to handle both adding new customers and updating existing customers. |
| **Country Selection** | The country drop-down list defaults to **United States**, with 20 other countries available, including **Iran**. |
| **Dynamic Form Behavior** | The form dynamically displays either the **Add Customer** button or the **Update Customer** button depending on whether a new customer is being added or an existing one is being updated. |
| **Validation Improvements** | Error messages are displayed in red for required fields that are left blank, and for improperly formatted phone numbers or email addresses. |
