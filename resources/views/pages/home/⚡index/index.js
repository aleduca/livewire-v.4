this.$on('user-created', () => {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: 'User Saved',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    })
})