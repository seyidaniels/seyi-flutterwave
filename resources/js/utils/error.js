export default function handleError(error) {
    if (error.response) {
        if (error.response.status == 401 || error.response.status == 400) {
            setTimeout(() => {
                location.href = "/"
            }, 3000);
        } else if (error.response.status === 422) {
            Object.values(error.response.data.errors).forEach(function (element) {
                toastr.error(element)
            })
        } else if (error.response.status === 404) {
            toastr.error("Could not find the requested resource")
        } else if (error.response.status === 500) {
            toastr.error("Ooops! Server Error")
        }
    }

}
