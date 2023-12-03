<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist Form</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <form id="checklistForm">
        <label><input type="checkbox" name="items[]" value="Item 1"> Item 1</label><br>
        <label><input type="checkbox" name="items[]" value="Item 2"> Item 2</label><br>
        <label><input type="checkbox" name="items[]" value="Item 3"> Item 3</label><br>
        <!-- Add more items as needed -->
    </form>

    <div id="selectedItems"></div>

    <script>
        $(document).ready(function() {
            // Handle checkbox changes
            $('#checklistForm input[type="checkbox"]').change(function() {
                updateSelectedItems();
            });

            // Function to update the selected items
            function updateSelectedItems() {
                // Get the selected items
                var selectedItems = $('#checklistForm input[type="checkbox"]:checked')
                    .map(function() {
                        return this.value;
                    })
                    .get();

                // Display the selected items
                $('#selectedItems').html('<strong>Selected Items:</strong><br>' + selectedItems.join('<br>'));
            }
        });
    </script>

</body>

</html>