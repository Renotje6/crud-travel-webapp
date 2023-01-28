// Get elements from DOM
const adults = document.getElementById("adults");
const children = document.getElementById("children");
const checkIn = document.getElementById("check-in");
const checkOut = document.getElementById("check-out");
const totalPrice = document.getElementById("total-price");

// Set min and default values for check-in and check-out
let today = new Date().toISOString().slice(0, 10);
let tomorrow = new Date(new Date().getTime() + 24 * 60 * 60 * 1000)
  .toISOString()
  .slice(0, 10);
checkIn.min = today;
checkIn.value = today;
checkOut.min = tomorrow;
checkOut.value = tomorrow;

// Calculate and set default value for total price
function calculateTotalPrice(price, reservationCosts) {
  const priceAdult = Number(price);
  const priceChild = Math.round(price / 2);
  const totalAdults = adults.value;
  const totalChildren = children.value;
  const totalDays =
    (new Date(checkOut.value) - new Date(checkIn.value)) / (1000 * 3600 * 24);

  const totalAdultPrice = totalAdults * priceAdult;
  const totalChildPrice = totalChildren * priceChild;
  const totalReservationCosts = Number(reservationCosts);

  const total =
    (totalAdultPrice + totalChildPrice) * totalDays + totalReservationCosts;

  totalPrice.value = `€ ${total}`;
}

// Check if check-out date is before check-in date and set check-out date to check-in date + 1 day
function checkDates() {
  let oneDayLater = new Date(
    new Date(checkIn.value).getTime() + 24 * 60 * 60 * 1000
  )
    .toISOString()
    .slice(0, 10);

  if (checkOut.value <= checkIn.value) {
    checkOut.min = oneDayLater;
    checkOut.value = oneDayLater;
  }

  if (checkIn.value < checkOut.value) {
    checkOut.min = checkIn.value;
  }
}
