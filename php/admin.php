<?php
include('server.php');

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<html>

<head>
    <title>Administrator</title>
    <?php include('-scripts.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="../js/showForm.js"></script>
</head>

<body class="bg-cc">
    <?php include('-header.php'); ?>
    <div class="pom-content">
        <div class="row">
            <div class="col">
                <div id="regBox" style="color: white;">
                    <h1 style="color:#FFF;">
                        <?php
                        echo "Dobro došli, " . $_SESSION['ime'] . ".";
                        ?>
                    </h1>
                    <div class="form-bg">
                        <label>Ime i prezime</label>
                        <input type="text" placeholder="Ime"
                            value="<?php echo $_SESSION['ime'] ?> <?php echo $_SESSION['prezime'] ?>"
                            class="form-control" readonly>
                        <label>Korisničko ime</label>
                        <input type="text" value="<?php echo $_SESSION['username'] ?>" class="form-control" readonly>
                        <label>E-mail</label>
                        <input type="text" value="<?php echo $_SESSION['email'] ?>" placeholder="example@mail.com"
                            class="form-control" readonly>
                        <label>Lozinka</label>
                        <input type="password" value="<?php echo $_SESSION['password'] ?>" placeholder="Lozinka"
                            class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary mm-btn" data-toggle="modal"
                    data-target="#exampleModalLong"><span class="pe-7s-add-user"></span> Dodajte novog
                    administratora</button>
                <?php
                // Povezivanje sa bazom
                $con = new PDO("mysql:host=localhost;dbname=zenulovic", "root", "");
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Provera i brisanje korisnika ako je ID postavljen
                if (isset($_GET['del_id'])) {
                    $id = $_GET['del_id'];
                    $sql = "DELETE FROM registrovani WHERE ID = :id";
                    $stmt = $con->prepare($sql);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                    header("Location: putanja-do-stranice-sa-korisnicima.php"); // Preusmerava na istu stranicu nakon brisanja
                }

                // Prikazivanje korisnika
                $sql = "SELECT ID, ime, prezime, username, email, vrsta FROM registrovani";
                $exc = $con->query($sql);

                echo "<table border=1 id='korisniciTab' class='table'><th>ID</th><th>Ime</th><th>Prezime</th><th>Korisnicko ime</th><th>Email</th><th>Privilegija</th><th>Akcija</th>";
                while ($row = $exc->fetch()) {
                    echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["ime"] . "</td><td>" . $row["prezime"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td><td>" . $row["vrsta"] . "</td><td><a href='?del_id=" . $row["ID"] . "'>Obrisati</a></td>";
                    echo "</tr>";
                }
                ?>
                <button id="dugmePokaziKO" type="button" onclick="pokaziKorisnike()"
                    class="btn btn-primary mm-btn">Profili</button>
                <?php
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT model_choose, adresa, brTel FROM raspolozivost"; // Promenjen SQL upit
                $exc = $con->query($sql);
                $nbrow = 0;

                // CSS za belu pozadinu i sakrivanje tabele
                echo "<style>.table { background-color: white; } #raspolozivostTab { display: none; }</style>";

                // Tabela je inicijalno sakrivena zahvaljujući 'display: none;'
                echo "<table border=1 id='raspolozivostTab' class='table'><th>Model</th><th>Adresa</th><th>Broj telefona</th>";

                while ($row = $exc->fetch()) {
                    echo "<tr><td>" . $row["model_choose"] . "</td><td>" . $row['adresa'] . "</td><td>" . $row['brTel'] . "</td>";
                    echo "</tr>";
                    $nbrow++;
                }
                ?>
                <button id="dugmePokaziNA" type="button" onclick="pokaziRaspolozivost()"
                    class="btn btn-primary mm-btn">Raspoloživost</button>



                <?php
                $con = new PDO("mysql:host=localhost;dbname=zenulovic", "root", "");
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM pitanja";
                $exc = $con->query($sql);
                $nbrow = 0;
                echo "<table border=1 id='pitanjaTab' class='table'><th>ID</th><th>Ime</th><th>Email</th><th>Dodatno</th><th>Akcija</th>";
                while ($row = $exc->fetch()) {
                    echo "<tr><td>" . $row["ID"] . "</td> <td>" . $row["ime"] . "</td><td>" . $row["email"] . "</td><td>" . $row['dodInfo'] . "</td><td><a href='del-pitanja.php?id=" . $row["ID"] . "'>Obrisati</a></td>";
                    echo "</tr>";
                    $nbrow++;
                }
                ?>
                <button id="dugmePokaziPI" type="button" onclick="pokaziPitanja()"
                    class="btn btn-primary mm-btn">Pitanja</button>

                <button id="dugmePokaziPolove" type="button" onclick="statistikaPolova()"
                    class="btn btn-primary mm-btn">Statistika Polova</button>
                <canvas style="background-color:white;" id="chartId" width="400" height="400"></canvas>


                <button id="dugmePokaziSaobracaj" type="button" onclick="statistikaSoba()"
                    class="btn btn-primary mm-btn">Statistika
                    saobraćaja u poslednjih 7 dana</button>

                <canvas style="background-color:white;margin-right:20px;display:none;" id="charSobe" width="600"
                    height="300"></canvas>

                <button style="display:none" id="download" type="button"
                    class="btn btn-primary mm-btn">Download</button>
            </div>
        </div>

    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Dodajte novog administratora</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="admin.php">
                        <label>Ime</label>
                        <input type="text" name="imeAD" class="form-control" required>
                        <label>Prezime</label>
                        <input type="text" name="prezimeAD" class="form-control" required>
                        <label>Korisničko ime</label>
                        <input type="text" name="usernameAD" class="form-control" required>
                        <label>E-mail</label>
                        <input type="email" name="emailAD" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                            class="form-control" required>
                        <label>Lozinka</label>
                        <input type="password" name="passwordAD" class="form-control" required>
                        <button type="submit" name="reg_admin" class="btn btn-primary">Potvrdi</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <script>
        let chartId;
        let chartInstance;
        let exportJson


        function initStatistikaChart() {

            let rawDataPoseta = <?php echo $jsonDataPoseta; ?>;
            console.log(rawDataPoseta);

            const dani = ['Nedelja', 'Ponedeljak', 'Utorak', 'Sreda', 'Četvrtak', 'Petak', 'Subota'];
            const labels = []

            Object.entries(rawDataPoseta).forEach(([key, value]) => {
                const datum = new Date(key);
                const danUNedelji = datum.getDay();
                const imeDana = dani[danUNedelji];
                labels.push(imeDana)
            });

            const sobe = ['dahlia', 'panorama', 'crazy_time', 'summer'];

            for (let datum in rawDataPoseta) {

                sobe.forEach((soba) => {
                    if (!rawDataPoseta[datum].hasOwnProperty(soba)) {
                        rawDataPoseta[datum][soba] = "0";
                    }
                });
            }

            console.log(rawDataPoseta);
            const rezultat = {};

            for (let datum in rawDataPoseta) {

                for (let soba in rawDataPoseta[datum]) {

                    if (!rezultat[soba]) {
                        rezultat[soba] = [];
                    }

                    rezultat[soba].push(parseInt(rawDataPoseta[datum][soba]));
                }
            }
            exportJson = rezultat
            console.log(rezultat);

            const data = {
                labels,
                datasets: [{
                    label: 'Dahlia',
                    data: rezultat.dahlia,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'SUMMER',
                    data: rezultat.summer,
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'PANORAMA',
                    data: rezultat.panorama,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'CRAZY TIME',
                    data: rezultat.crazy_time,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }
                ]
            };
            var ctx = document.getElementById('charSobe').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Statistika saobraćaja soba u poslednjih 7 dana'
                        }
                    }
                },
            });
        }

        window.addEventListener("DOMContentLoaded", (event) => {
            initChart();
            initStatistikaChart()
            chartId = document.getElementById("chartId");
            chartId.style.display = "none";
        });



        document.getElementById("download").addEventListener("click", function () {
            const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(exportJson));
            const downloadAnchorNode = document.createElement('a');
            downloadAnchorNode.setAttribute("href", dataStr);
            downloadAnchorNode.setAttribute("download", "exportStats.json");
            document.body.appendChild(downloadAnchorNode); // potrebno za Firefox
            downloadAnchorNode.click();
            downloadAnchorNode.remove();
        });

        function initChart() {
            let rawData = <?php echo $jsonData; ?>;
            console.log(rawData);
            let numbers = Object.keys(rawData).map(key => parseInt(rawData[key], 10));
            let total = numbers.reduce((acc, val) => acc + val, 0);
            let percentages = numbers.map(function (element) {
                return (element / total) * 100;
            });
            const chrt = document.getElementById("chartId").getContext("2d");
            chartInstance = new Chart(chrt, {
                type: "pie",
                data: {
                    labels: ["Muškarci", "Žene"],
                    datasets: [{
                        label: "online tutorial subjects",
                        data: percentages,
                        backgroundColor: [
                            "lightblue",
                            "pink"
                        ],
                        hoverOffset: 5,
                    },],
                },
                options: {
                    responsive: false,
                },
            });
        }

        function statistikaSoba() {
            const x = document.getElementById("charSobe");
            const z = document.getElementById("dugmePokaziSaobracaj");
            const m = document.getElementById("download");


            if (x.style.display === "block") {
                x.style.display = "none";
                m.style.display = "none";

                z.innerText = "Statistika saobraćaja u poslednjih 7 dana";
            } else {
                x.style.display = "block";
                m.style.display = "block    ";

                z.innerText = "Zatvori";
            }
        }
        function statistikaPolova() {
            const x = document.getElementById("chartId");
            const z = document.getElementById("dugmePokaziPolove");

            if (x.style.display === "block") {
                x.style.display = "none";
                z.innerText = "Statistika Polova";
            } else {
                x.style.display = "block";
                z.innerText = "Zatvori";
            }
        }
    </script>
    <?php include('-footer.php'); ?>

</body>

</html>