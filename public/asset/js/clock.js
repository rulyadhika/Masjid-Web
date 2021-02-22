const clockDisplay = document.querySelector(".clockDisplay");
// const dateDisplay = document.querySelector(".dateDisplay");

function showTime() {
  let calender = new Date();
  // let date = calender.toLocaleDateString("id", {
  //   weekday: "long",
  //   year: "numeric",
  //   month: "long",
  //   day: "numeric",
  // });

  let hour = calender.getHours();
  let minutes = calender.getMinutes();
  let second = calender.getSeconds();

  if (hour / 10 < 1) {
    hour = "0" + hour;
  }
  if (minutes / 10 < 1) {
    minutes = "0" + minutes;
  }
  if (second / 10 < 1) {
    second = "0" + second;
  }

  clockDisplay.innerHTML = `${hour} : ${minutes} : ${second} WIB`;
  // dateDisplay.innerHTML = date;
}

setInterval(() => {
  showTime();
}, 1000);
