// Declare Consts & Lets
const elMonth = document.getElementById('js-month')
const elDay = document.getElementById('js-day')
const monthNames = ['JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER']
const today = new Date()
const month = monthNames[today.getMonth()]
const day = today.getDate()

// Write To Page
elMonth.textContent = month
elDay.textContent = day
