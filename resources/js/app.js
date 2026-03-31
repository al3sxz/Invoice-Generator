import "./bootstrap";

const sidebarToggle = document.getElementById("sidebar-toggle");

// ─── Sidebar Toggle ───
sidebarToggle.addEventListener("click", () =>
    document.getElementById("sidebar").classList.toggle("collapsed"),
);

// ─── Modal ───
function openModal() {
    document.getElementById("modal").classList.add("open");
}
function closeModal() {
    document.getElementById("modal").classList.remove("open");
}
