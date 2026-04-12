function confirmDelete(deleteUrl) {
    if (confirm("Are you sure you want to delete this record? This action cannot be undone.")) {
        window.location.href = deleteUrl;
    }
}