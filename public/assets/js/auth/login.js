function handlePasswordVisibility() {
    let inputPassword = document.getElementById('password')

    if(inputPassword.type == 'password') {
        inputPassword.type = 'text'

        document.getElementById('iconEyeSlash').classList.add('d-none')
        document.getElementById('iconEye').classList.remove('d-none')
    }
    else {
        inputPassword.type = 'password'

        document.getElementById('iconEye').classList.add('d-none')
        document.getElementById('iconEyeSlash').classList.remove('d-none')
    }
}
