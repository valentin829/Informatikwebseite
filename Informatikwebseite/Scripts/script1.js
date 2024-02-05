const events = [
    { date: "2023-09-07", title: "Rettungsschwimmkurs" },
    { date: "2023-09-10", title: "Schnorchelkurs" },
    { date: "2023-09-14", title: "Schwimmtechnik-Workshop" },
    { date: "2023-09-18", title: "Schwimmwettkampf" },
    { date: "2023-09-21", title: "Schwimmkurs für Kinder" },
    { date: "2023-09-25", title: "Wasserballturnier" },
    { date: "2023-09-29", title: "Schwimmen für Fortgeschrittene" },
    { date: "2023-10-05", title: "Schwimmparty" },
    { date: "2023-10-08", title: "Wassergymnastik" },
    { date: "2023-10-12", title: "Wasserpolo-Training" },
    { date: "2023-10-15", title: "Schwimmkurs für Anfänger" },
    { date: "2023-10-20", title: "Schwimmen für Jugendliche" },
    { date: "2023-10-25", title: "Schwimmen mit Flossen" },
    { date: "2023-10-30", title: "Tauchkurs" },
    { date: "2023-11-03", title: "Familienschwimmen" },
    { date: "2023-11-07", title: "Fortgeschrittenen-Schwimmtraining" },
    { date: "2023-11-10", title: "Atemtechnik-Training" },
    { date: "2023-11-14", title: "Wasserballspiel" },
    { date: "2023-11-15", title: "Freiwasserschwimmen" },
    { date: "2023-11-21", title: "Synchronschwimmen-Training" },
    { date: "2023-11-28", title: "Wasserspiele" },
    { date: "2023-12-02", title: "Wasserrettungskurs" },
    { date: "2023-12-08", title: "Aqua-Fitnesskurs" },
    { date: "2023-12-12", title: "Schwimmen für Schwangere" },
    { date: "2023-12-17", title: "Seniorenschwimmen" },
    { date: "2023-12-19", title: "Wasserski-Training" },
    { date: "2023-12-23", title: "Schwimmen für alle" },
    { date: "2023-12-30", title: "Nachtschwimmen" },
];

const currentDate = new Date();
let currentMonth = currentDate.getMonth() + 1;
let currentYear = currentDate.getFullYear();

function generateCalendar(month, year) {
    const daysInMonth = new Date(year, month, 0).getDate();
    const firstDayIndex = new Date(year, month - 1, 1).getDay();
    const monthNames = ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];
    
    const monthElement = document.getElementById("month");
    const daysElement = document.getElementById("days");
    const eventListElement = document.getElementById("event-list");
    
    monthElement.innerText = monthNames[month - 1] + " " + year;
    
    let days = "";
    
    for (let i = 0; i < firstDayIndex; i++) {
        days += "<li></li>";
    }
    
    for (let day = 1; day <= daysInMonth; day++) {
        let dayClass = "";
        const currentDate = new Date(year, month - 1, day);
        const dateString = currentDate.toISOString().split("T")[0];
        
        const event = events.find(e => e.date === dateString);
        if (event) {
            dayClass = "event";
        }
        
        days += `<li class="${dayClass}" data-date="${dateString}">${day}</li>`;
    }
    
    daysElement.innerHTML = days;
    
    const calendarDays = document.querySelectorAll(".days li");
    calendarDays.forEach((dayElement, index) => {
        if (index >= firstDayIndex) {
            dayElement.addEventListener("click", () => {
                const selectedDate = dayElement.getAttribute("data-date");
                const event = events.find(e => e.date === selectedDate);
                
                if (event) {
                    alert(`Termin am ${selectedDate}: ${event.title}`);
                } else {
                    alert(`Kein Termin am ${selectedDate}`);
                }
            });
        }
    });

    let eventList = "<h2>Terminübersicht</h2><ul>";
    events.forEach(event => {
        const eventDate = new Date(event.date);
        if (eventDate.getMonth() + 1 === month && eventDate.getFullYear() === year) {
            eventList += `<li>${event.date}: ${event.title}</li>`;
        }
    });
    eventList += "</ul>";
    eventListElement.innerHTML = eventList;
}

document.addEventListener("DOMContentLoaded", function () {
    generateCalendar(currentMonth, currentYear);

    
    document.querySelector(".prev").addEventListener("click", () => {
        currentMonth -= 1;
        if (currentMonth < 1) {
            currentMonth = 12;
            currentYear -= 1;
        }
        generateCalendar(currentMonth, currentYear);
    });

    document.querySelector(".next").addEventListener("click", () => {
        currentMonth += 1;
        if (currentMonth > 12) {
            currentMonth = 1;
            currentYear += 1;
        }
        generateCalendar(currentMonth, currentYear);
    });
});
