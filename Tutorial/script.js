// Function to add data to JSON file
function addData() {
    var name = document.getElementById("name").value;
    var age = document.getElementById("age").value;

    // Create an object with the provided data
    var data = { "name": name, "age": age };

    // Read existing data from the JSON file
    fetch("data.json")
        .then(response => response.json())
        .then(existingData => {
            // Append the new data to the existing data array
            existingData.push(data);

            // Write the updated data back to the JSON file
            fetch("data.json", {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(existingData),
            })
                .then(() => {
                    console.log("Data added successfully!");
                    // Clear input fields after adding data
                    document.getElementById("name").value = "";
                    document.getElementById("age").value = "";
                })
                .catch(error => {
                    console.error("Error adding data:", error);
                });
        })
        .catch(error => {
            console.error("Error retrieving data:", error);
        });
}

// Function to retrieve data from JSON file
function retrieveData() {
    // Read data from the JSON file
    fetch("data.json")
        .then(response => response.json())
        .then(data => {
            // Display the data in the HTML output element
            var output = document.getElementById("output");
            output.innerHTML = "";

            if (data.length === 0) {
                output.innerHTML = "No data available.";
                return;
            }

            for (var i = 0; i < data.length; i++) {
                output.innerHTML += "Name: " + data[i].name + ", Age: " + data[i].age + "<br>";
            }
        })
        .catch(error => {
            console.error("Error retrieving data:", error);
        });
}

// Initialize the JSON file with an empty array if it doesn't exist
fetch("data.json")
    .then(response => response.json())
    .catch(() => {
        fetch("data.json", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: "[]",
        })
            .then(() => {
                console.log("Data file initialized.");
            })
            .catch(error => {
                console.error("Error initializing data file:", error);
            });
    });
