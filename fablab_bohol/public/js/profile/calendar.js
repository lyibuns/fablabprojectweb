document.addEventListener('DOMContentLoaded', () => {
    let bookingMode = null;
  
    const openBtn = document.getElementById('bookingOpenBtn');
    const closeBtn = document.getElementById('bookingCloseBtn');
    const cancelBtn = document.getElementById('bookingCancelBtn');
    const slots = document.querySelectorAll('.booking-slot');
  
    function clearActiveStates() {
      openBtn.classList.remove('active');
      closeBtn.classList.remove('active');
      cancelBtn.classList.remove('active');
    }
  
    openBtn.addEventListener('click', () => {
      bookingMode = 'open';
      clearActiveStates();
      openBtn.classList.add('active');
    });
  
    closeBtn.addEventListener('click', () => {
      bookingMode = 'close';
      clearActiveStates();
      closeBtn.classList.add('active');
    });
  
    cancelBtn.addEventListener('click', () => {
      bookingMode = null;
      clearActiveStates();
      cancelBtn.classList.add('active');
    });
  
    slots.forEach(slot => {
      slot.addEventListener('click', () => {
        if (!bookingMode) return;
  
        slot.classList.remove('booking-opened', 'booking-closed');
  
        if (bookingMode === 'open') {
          slot.classList.add('booking-opened');
        } else if (bookingMode === 'close') {
          slot.classList.add('booking-closed');
        }
      });
    });
  });

  // Select All buttons per column
const selectAllBtns = document.querySelectorAll('.select-all-day');

selectAllBtns.forEach(button => {
  button.addEventListener('click', () => {
    if (!bookingMode) return;

    const dayIndex = parseInt(button.getAttribute('data-day'));

    // Find all slots in the same column
    document.querySelectorAll(`.calendar-table tbody tr`).forEach(row => {
      const cell = row.children[dayIndex]; // td at that day index
      if (cell && cell.classList.contains('booking-slot')) {
        cell.classList.remove('booking-opened', 'booking-closed');
        if (bookingMode === 'open') {
          cell.classList.add('booking-opened');
        } else if (bookingMode === 'close') {
          cell.classList.add('booking-closed');
        }
      }
    });
  });
});

  