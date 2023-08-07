<!DOCTYPE html>
<html>
<head>
    <title>Address Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Address Book</h1>

        <!-- Form Create Contact Profile -->
        <form id="createForm" class="mb-4">
            <h2>Create New Contact Profile</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

        <!-- Table to Display Contact Profiles -->
        <table id="contactTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // Function to refresh contact table
        function refreshContactTable() {
            $.ajax({
                url: '/contact-profiles',
                method: 'GET',
                success: function(data) {
                    var tableBody = $('#contactTable tbody');
                    tableBody.empty();

                    data.forEach(function(profile) {
                        tableBody.append('<tr>' +
                            '<td>' + profile.name + '</td>' +
                            '<td>' + profile.email + '</td>' +
                            '<td>' + profile.phone + '</td>' +
                            '<td>' + profile.address + '</td>' +
                            '<td><button class="btn btn-info btn-sm" onclick="editContact(' + profile.id + ')">Edit</button> ' +
                            '<button class="btn btn-danger btn-sm" onclick="deleteContact(' + profile.id + ')">Delete</button></td>' +
                            '</tr>');
                    });
                }
            });
        }

        // Function to handle form submit for create
        $('#createForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '/contact-profiles/create',
                method: 'POST',
                data: formData,
                success: function(data) {
                    $('#createForm')[0].reset();
                    refreshContactTable();
                }
            });
        });

        // Function to handle form submit for update
        function editContact(id) {
            $.ajax({
                url: '/contact-profiles/get/' + id,
                method: 'GET',
                success: function(data) {
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#address').val(data.address);
                    $('#createForm').append('<input type="hidden" name="id" value="' + data.id + '">');
                }
            });
        }

        // Function to handle delete contact
        function deleteContact(id) {
            if (confirm('Are you sure to delete this contact profile?')) {
                $.ajax({
                    url: '/contact-profiles/delete/' + id,
                    method: 'DELETE',
                    success: function(data) {
                        refreshContactTable();
                    }
                });
            }
        }

        // Initial table load
        refreshContactTable();
    </script>
</body>
</html>
