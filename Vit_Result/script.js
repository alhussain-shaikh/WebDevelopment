document.addEventListener("DOMContentLoaded", function () {
    fetch("get_results.php")
        .then((response) => response.json())
        .then((data) => {
            const resultsTable = document.getElementById("results-table").getElementsByTagName("tbody")[0];

            data.forEach((row) => {
                const newRow = resultsTable.insertRow(resultsTable.rows.length);
                const nameCell = newRow.insertCell(0);
                const regNumberCell = newRow.insertCell(1);
                const subjectCell = newRow.insertCell(2);
                const mseMarksCell = newRow.insertCell(3);
                const eseMarksCell = newRow.insertCell(4);
                const totalMarksCell = newRow.insertCell(5);

                nameCell.innerHTML = row.first_name + " " + row.last_name;
                regNumberCell.innerHTML = row.registration_number;
                subjectCell.innerHTML = row.subject_name;
                mseMarksCell.innerHTML = row.mse_marks;
                eseMarksCell.innerHTML = row.ese_marks;
                totalMarksCell.innerHTML = row.total_marks;
            });
        })
        .catch((error) => {
            console.error("Error fetching data: " + error);
        });
});
