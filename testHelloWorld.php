<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Car Rental</title>
    <style>
        /* CSS για τοποθέτηση του κειμένου στη μέση της σελίδας */
        .center-text {
            text-align: center;
        }
        
        /* CSS για το πάνελ φίλτρων */
        .filter-panel {
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 300px;
        }
        
        /* CSS για το κουμπί εφαρμογής φίλτρου */
        .filter-panel button {
            display: block;
            width: 50%;
            padding: 8px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body style="background-color:powderblue;">

    <h2 class="center-text" style="font-size:38px;">Καλώς ήρθατε στην ιστοσελίδα κράτησης αυτοκινήτων!</h2>
    
    <!-- Πάνελ φίλτρων -->
    <div class="filter-panel">
        <h2>Επιλέξτε φίλτρα:</h2>
        <h4>Μάρκα:<br><select id="filter-options"></h4>
            <option value="option1">Audi</option>
            <option value="option2">Mercedes</option>
            <option value="option3">Nissan</option>
            <!-- Προσθέστε περισσότερες επιλογές εάν είναι απαραίτητο -->
        </select>
		<h4>Κυβικά:<br><select id="filter-options"></h4>
            <option value="option1">1600cc</option>
            <option value="option2">1800cc</option>
            <option value="option3">2000cc</option>
			</select>
			<h4>Τοποθεσία παραλαβής:<br><select id="filter-options"></h4>
            <option value="option1">Αθήνα</option>
            <option value="option2">Αεροδρόμιο Ελευθέριος Βενιζέλος</option>
            <option value="option3">Πειραίας</option>
			</select>
			<h4>Τοποθεσία επιστροφής:<br><select id="filter-options"></h4>
            <option value="option1">Αθήνα</option>
            <option value="option2">Αεροδρόμιο Ελευθέριος Βενιζέλος</option>
            <option value="option3">Πειραίας</option>
            <!-- Προσθέστε περισσότερες επιλογές εάν είναι απαραίτητο -->
        </select>
        <button onclick="applyFilter()">Εφαρμογή Φίλτρου</button>
    </div>
    
    <!-- Περιεχόμενο της σελίδας -->
    <!-- Εδώ μπορείτε να προσθέσετε το περιεχόμενο που θέλετε να φιλτράρετε -->

    <script>
        function applyFilter() {
            var selectedOption = document.getElementById("filter-options").value;
            // Εδώ μπορείτε να υλοποιήσετε τη λογική φιλτραρίσματος με βάση την επιλεγμένη επιλογή
            alert("Εφαρμόστηκε φίλτρο: " + selectedOption);
        }
    </script>

</body>
</html>
