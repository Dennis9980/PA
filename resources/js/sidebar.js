const sidebar = document.getElementById("sidebar");
const toggleSidebarButton = document.getElementById("toggleSidebarButton");
// Click Sidebar
if(toggleSidebarButton){
    toggleSidebarButton.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
    });
}