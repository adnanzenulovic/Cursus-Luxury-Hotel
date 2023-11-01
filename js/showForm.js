window.onload = function () {
  document.getElementById("raspolozivostTab").style.display = "none";
};
function pokazi() {
  var x = document.getElementById("tabelica");
  var y = document.getElementById("dugmePokazi");

  if (x.style.display === "none") {
    x.style.display = "table";
    y.innerText = "Zatvori";
  } else {
    x.style.display = "none";
    y.innerText = "Izmenite podatke";
  }
}

function pokaziAD() {
  var x = document.getElementById("tabelica");
  var z = document.getElementById("dugmePokaziAD");

  if (x.style.display === "none") {
    x.style.display = "table";
    z.innerText = "Zatvori";
  } else {
    x.style.display = "none";
    z.innerText = "Dodavanje novog administratora";
  }
}

function pokaziKorisnike() {
  var x = document.getElementById("korisniciTab");
  var z = document.getElementById("dugmePokaziKO");

  if (x.style.display === "none") {
    x.style.display = "table";
    z.innerText = "Zatvori";
  } else {
    x.style.display = "none";
    z.innerText = "Profili";
  }
}

function pokaziRaspolozivost() {
  var x = document.getElementById("raspolozivostTab");
  var z = document.getElementById("dugmePokaziNA");

  if (x.style.display === "none") {
    x.style.display = "table";
    z.innerText = "Zatvori";
  } else {
    x.style.display = "none";
    z.innerText = "Raspoloživost";
  }
}
  
function pokaziPitanja() {
  var x = document.getElementById("pitanjaTab");
  var z = document.getElementById("dugmePokaziPI");

  if (x.style.display === "none") {
    x.style.display = "table";
    z.innerText = "Zatvori";
  } else {
    x.style.display = "none";
    z.innerText = "Pitanja";
  }
}

function statistikaPolova() {
  console.log("object");
  var x = document.getElementById("chartId");
  var z = document.getElementById("dugmePokaziPolove");

  var chrt = document.getElementById("chartId").getContext("2d");
  console.log("object");
  var chartId = new Chart(chrt, {
    type: "pie",
    data: {
      labels: ["HTML", "CSS", "JAVASCRIPT", "CHART.JS", "JQUERY", "BOOTSTRP"],
      datasets: [
        {
          label: "online tutorial subjects",
          data: [20, 40, 13, 35, 20, 38],
          backgroundColor: [
            "yellow",
            "aqua",
            "pink",
            "lightgreen",
            "gold",
            "lightblue",
          ],
          hoverOffset: 5,
        },
      ],
    },
    options: {
      responsive: false,
    },
  });

  if (x.style.display === "none") {
    x.style.display = "table";
    z.innerText = "Zatvori";
  } else {
    x.style.display = "none";
    z.innerText = "Pitanja";
  }
}
