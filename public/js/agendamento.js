let calendar = document.querySelector(".calendar");

const month_names = [
    "Janeiro",
    "Fevereiro",
    "Março",
    "Abril",
    "Maio",
    "Junho",
    "Julho",
    "Agosto",
    "Setembro",
    "Outubro",
    "Novembro",
    "Dezembro",
];

isLeapYear = (year) => {
    return (
        (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
        (year % 100 === 0 && year % 400 === 0)
    );
};

getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28;
};

generateCalendar = (month, year) => {
    let calendar_days = calendar.querySelector(".calendar-days");
    let calendar_header_year = calendar.querySelector("#year");

    let days_of_month = [
        31,
        getFebDays(year),
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
    ];

    function botaoData() {
        limparBotoes();
        obterData(this);
    }

    function limparBotoes() {
        lista = document.getElementById("calendar-days").childNodes;
        lista.forEach((index) => {
            index.classList.remove("selected");
        });
    }

    function obterData(day) {
        mes = parseInt(month) + parseInt(1);
        let DateSelect = document.getElementsByClassName("data");

        day.classList.toggle("selected");

        if (day.id != "") {
            if (day.id.length == 1) {
                DateSelect[0].value = 0 + day.id + "/" + mes + "/" + year;
                DateSelect[1].textContent = 0 + day.id + "/" + mes + "/" + year;
            } else {
                DateSelect[0].value = day.id + "/" + mes + "/" + year;
                DateSelect[1].textContent = day.id + "/" + mes + "/" + year;
            }
        }
    }

    calendar_days.innerHTML = "";

    let currDate = new Date();

    if (!year) year = currDate.getFullYear();

    let curr_month = `${month_names[month]}`;
    month_picker.innerHTML = curr_month;
    calendar_header_year.innerHTML = year;

    let first_day = new Date(year, month, 1);

    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
        let day = document.createElement("div");
        let day2 = 0;
    
        if (i >= first_day.getDay()) {
            day.classList.add("calendar-day-button");
            day2 = i - first_day.getDay() + 1;
            day.id = day2;
            day.innerHTML = day2;
    
            if (i % 7 === 0) { // Verifica se é domingo (índice 0)
                day.classList.add("disabled");
            } else {
                day.addEventListener("click", botaoData);
                day.classList.add("enabled");
            }
    
            if (
                i - first_day.getDay() + 1 === currDate.getDate() &&
                year === currDate.getFullYear() &&
                month === currDate.getMonth()
            ) {
                day.classList.add("curr-date");
            } else if (
                (i - first_day.getDay() + 1 < currDate.getDate() &&
                    month === currDate.getMonth()) ||
                month < currDate.getMonth() ||
                year < currDate.getFullYear()
            ) {
                day.removeEventListener("click", botaoData);
                day.classList.remove("enabled");
            }
        }
    
        calendar_days.appendChild(day);
    }
    

    inputData = document.getElementsByClassName("data");
    inputData[0].value =
        currDate.getDate() +
        "/" +
        (currDate.getMonth() + 1) +
        "/" +
        currDate.getFullYear();
    inputData[1].textContent =
        currDate.getDate() +
        "/" +
        (currDate.getMonth() + 1) +
        "/" +
        currDate.getFullYear();
};

let month_list = calendar.querySelector(".month-list");

var row_counter = 0;
let month_row = document.createElement("div");
month_row.classList.add("row");
month_row.setAttribute("data-row", row_counter);
month_list.appendChild(month_row);

month_names.forEach((e, index) => {
    if (index % 4 == 0) {
        row_counter += 1;

        let month_row = document.createElement("div");
        month_row.classList.add("row");
        month_row.setAttribute("data-row", row_counter);
        month_list.appendChild(month_row);
    }
    current_month_row = document.querySelector(`[data-row="${row_counter}"]`);

    let month = document.createElement("div");
    month.classList.add("btn", "btn-outline-secondary", "m-2", "col");
    month.innerHTML = `<div data-month="${index}">${e}</div>`;

    month.querySelector("div").onclick = () => {
        month_list.classList.remove("show");
        curr_month.value = index;
        generateCalendar(index, curr_year.value);
    };

    current_month_row.appendChild(month);
});

let month_picker = calendar.querySelector("#month-picker");

month_picker.addEventListener("click", function (e) {
    e = window.event;
    mouseX = e.clientX;
    mouseY = e.clientY;

    month_list.style.top = mouseY + "px";
    month_list.style.left = mouseX + "px";

    month_list.classList.add("show");
});

let currDate = new Date();

let curr_month = { value: currDate.getMonth() };
let curr_year = { value: currDate.getFullYear() };

generateCalendar(curr_month.value, curr_year.value);




function limitarSetores() {
    var hotelSelect = document.getElementById("hotel");
    var setoresSelect = document.getElementById("setor");

    // Obter o valor selecionado no hotelSelect
    var hotelSelecionado = hotelSelect.value;

    // Limpar todas as opções de setoresSelect
    setoresSelect.innerHTML = "";
    var defaultOption = document.createElement("option");
    defaultOption.selected = true;
    defaultOption.text = "Selecione";
    setoresSelect.add(defaultOption);

    // Adicionar as opções de setores com base no hotel selecionado
    if (hotelSelecionado === "HOTEL - BELA VISTA") {
        var option1 = document.createElement("option");
        option1.value = "Garçom";
        option1.text = "Garçom";
        setoresSelect.add(option1);

        var option2 = document.createElement("option");
        option2.value = "Cozinha";
        option2.text = "Cozinha";
        setoresSelect.add(option2);

        var option3 = document.createElement("option");
        option3.value = "Recepção";
        option3.text = "Recepção";
        setoresSelect.add(option3);

        var option4 = document.createElement("option");
        option4.value = "Bar";
        option4.text = "Bar";
        setoresSelect.add(option4);
    } else {
        var option1 = document.createElement("option");
        option1.value = "Governança";
        option1.text = "Governança";
        setoresSelect.add(option1);

        var option2 = document.createElement("option");
        option2.value = "Recepção";
        option2.text = "Recepção";
        setoresSelect.add(option2);
    }
}
