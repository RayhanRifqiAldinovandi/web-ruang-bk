function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const actualSide = document.getElementById('sidebar-multi-level-sidebar');
    // actualSide.classList.toggle('-translate-x-full');
    actualSide.classList.toggle('sm:translate-x-0')
    
}

function toggleList1() {
    const dropdownList = document.getElementById('dropdown-1');
    dropdownList.classList.toggle("hidden");
}

function toggleList2() {
    const dropdownList = document.getElementById('dropdown-2');
    dropdownList.classList.toggle("hidden");
}
function toggleList3() {
    const dropdownList = document.getElementById('dropdown-3');
    dropdownList.classList.toggle("hidden");
}
function toggleList4() {
    const dropdownList = document.getElementById('dropdown-4');
    dropdownList.classList.toggle("hidden");
}
function toggleList5() {
    const dropdownList = document.getElementById('dropdown-5');
    dropdownList.classList.toggle("hidden");
}

const toast = document.getElementById('toast');

// Function to slide the toast to the right
function slideToast() {
  // Add the animation class to the toast
  toast.classList.add('translate-x-full');

  // Wait for the animation to finish, then remove the toast
  setTimeout(() => {
    toast.style.display = 'none'; // or toast.remove() to remove the element from the DOM
  }, 2000); // Adjust the time according to your animation duration
}


// Add event listener to slide the toast when it's loaded
window.addEventListener('load', slideToast);

$(document).ready( function () {
$('#logtable').DataTable()
} );

