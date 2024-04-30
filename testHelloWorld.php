<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Car Rental</title>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    /* CSS για τοποθέτηση του κειμένου στη μέση της σελίδας */
    .center-text {
        text-align: center;
    }

    /* CSS για το πάνελ φίλτρων */
    .filter-panel {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
        max-width: 400px;
    }

    /* Στυλ για τους τίτλους των φίλτρων */
    .filter-title {
        margin-top: 0;
        font-size: 18px;
        color: #333;
    }

    /* Στυλ για τα dropdowns */
    .filter-select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box; /* Εξασφαλίζει ότι το padding δεν προστίθεται στο πλάτος του πεδίου */
    }

    /* Στυλ για τα πεδία εισαγωγής ημερομηνίας */
    .filter-date {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box; /* Εξασφαλίζει ότι το padding δεν προστίθεται στο πλάτος του πεδίου */
    }

    /* Στυλ για το κουμπί εφαρμογής φίλτρου */
    .filter-panel button {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Όταν το ποντίκι περνάει πάνω από το κουμπί, αλλάζει το χρώμα του φόντου */
    .filter-panel button:hover {
        background-color: #45a049;
    }

    /* Στυλ για το μήνυμα λάθους */
    .error-message {
        color: #ff0000;
        font-size: 14px;
        margin-top: 10px;
    }

    /* Πλέγμα (grid) για διάταξη */
    .grid-container {
        display: grid;
        grid-template-columns: auto 1fr auto;
        gap: 20px;
        padding: 20px;
    }

    /* CSS για το δεύτερο πάνελ με τις φωτογραφίες */
    .photo-panel {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
    }

    /* Στυλ για τον τίτλο του δεύτερου πάνελ */
    .photo-title {
        margin-top: 0;
        font-size: 18px;
        color: #333;
        text-align: center;
    }

    /* Στυλ για τις φωτογραφίες */
    .car-photo {
        display: block;
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }
</style>
</head>

<body style="background-color: #f2f2f2;">

<h2 class="center-text" style="font-size: 38px; margin-top: 20px;">Καλώς ήρθατε στην ιστοσελίδα κράτησης αυτοκινήτων!</h2>

<!-- Πλέγμα για τοποθέτηση πάνελ φίλτρων, φωτογραφιών και περιεχομένου -->
<div class="grid-container">
    <!-- Πάνελ φίλτρων -->
    <div class="filter-panel">
        <h3 class="filter-title">Επιλέξτε φίλτρα:</h3>
        <div>
            <h4 class="filter-title">Μάρκα:</h4>
            <select class="filter-select">
                <option value="Audi">Audi</option>
                <option value="Mercedes">Mercedes</option>
                <option value="Nissan">Nissan</option>
            </select>
        </div>
        <div>
            <h4 class="filter-title">Κυβικά:</h4>
            <select class="filter-select">
                <option value="1600cc">1600cc</option>
                <option value="1800cc">1800cc</option>
                <option value="2000cc">2000cc</option>
            </select>
        </div>
        <div>
            <h4 class="filter-title">Τοποθεσία παραλαβής:</h4>
            <select class="filter-select">
                <option value="Athens">Αθήνα</option>
                <option value="Eleftherios Venizelos Airport">Αεροδρόμιο Ελευθέριος Βενιζέλος</option>
                <option value="Piraeus">Πειραιάς</option>
            </select>
        </div>
        <div>
            <h4 class="filter-title">Τοποθεσία επιστροφής:</h4>
            <select class="filter-select">
                <option value="Athens">Αθήνα</option>
                <option value="Eleftherios Venizelos Airport">Αεροδρόμιο Ελευθέριος Βενιζέλος</option>
                <option value="Piraeus">Πειραιάς</option>
            </select>
        </div>
        <div>
            <h4 class="filter-title">Ημερομηνία παραλαβής:</h4>
            <input type="text" class="filter-date" id="pickup-date">
        </div>
        <div>
            <h4 class="filter-title">Ημερομηνία επιστροφής:</h4>
            <input type="text" class="filter-date" id="return-date">
        </div>
        <div id="error-message" class="error-message"></div>


    <button onclick="applyFilter()">Εφαρμογή Φίλτρου</button>
    </div>

    <!-- Δεύτερο πάνελ με φωτογραφίες -->
    <div class="photo-panel">
        <h3 class="photo-title">Φωτογραφίες Αυτοκινήτων</h3>
        <!-- Εδώ μπορείτε να τοποθετήσετε τις φωτογραφίες ανάλογα με τη μάρκα -->
		if (
        <img src="wrongname.gif" alt="Flowers in Chania">
        <img class="car-photo" src="mercedes.jpg" alt="Mercedes">
        <img class="car-photo" src="nissan.jpg" alt="Nissan">
    </div>
</div>

<script>
    $(document).ready(function() {
        // Εφαρμογή jQuery UI DatePicker στα πεδία ημερομηνίας
        $("#pickup-date").datepicker();
        $("#return-date").datepicker();
    });

    
</script>
<script>
 function applyFilter() {
        var pickupDate = document.getElementById("pickup-date").value;
        var returnDate = document.getElementById("return-date").value;
        var errorMessage = document.getElementById("error-message");

        // Έλεγχος αν οι ημερομηνίες είναι κενές
        if (pickupDate === "" || returnDate === "") {
            errorMessage.innerText = "Παρακαλώ εισάγετε τις ημερομηνίες παραλαβής και επιστροφής.";
            return;
        }

        // Εδώ μπορείτε να συνεχίσετε με την εφαρμογή του φίλτρου
        var brandFilter = document.getElementsByClassName("filter-select")[0].value;
        var engineFilter = document.getElementsByClassName("filter-select")[1].value;
        var pickupLocationFilter = document.getElementsByClassName("filter-select")[2].value;
        var returnLocationFilter = document.getElementsByClassName("filter-select")[3].value;

        var filterData = {
            brand: brandFilter,
            engine: engineFilter,
            pickupLocation: pickupLocationFilter,
            returnLocation: returnLocationFilter,
            pickupDate: pickupDate,
            returnDate: returnDate
        };

        alert("Εφαρμόστηκε φίλτρο: " + JSON.stringify(filterData));
    }
</script>

</body>
</html>
