<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculation</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        form select,
        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #result {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Electricity Bill Calculation</h2>
        <form id="billingForm">
            <label for="tariff">Tariff:</label>
            <select id="tariff" name="tariff">
                <?php foreach ($tariffs as $tariff): ?>
                    <option value="<?= $tariff['tariff_name']; ?>"><?= $tariff['tariff_name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="purpose">Purpose:</label>
            <select id="purpose" name="purpose">
                <?php foreach ($purposes as $purpose): ?>
                    <option value="<?= $purpose['purpose_name']; ?>"><?= $purpose['purpose_name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="billing_cycle">Billing Cycle:</label>
            <select id="billing_cycle" name="billing_cycle">
                <option value="2 months">2 months</option>
            </select>

            <label for="phase">Phase:</label>
            <select id="phase" name="phase">
                <option value="Single">Single</option>
            </select>

            <label for="consumed_units">Consumed Units:</label>
            <input type="number" id="consumed_units" name="consumed_units" required>

            <button type="submit">Calculate Bill</button>
        </form>

        <div id="result">
            <h3>Energy Charge: <span id="energyCharge">0</span></h3>
            <h3>Total Bill: <span id="TotalBillAMount">0</span></h3>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#billingForm').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '/Kseb-bill/index.php/BillingController/calculate_bill',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        $('#energyCharge').text(response.energy_charge);
                        $('#TotalBillAMount').text(response.total_bill);
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error: ' + status + ' - ' + error);
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>