function validateForm(ev){
    //validate email
    let email = document.forms.meetingForm.email.value;
    if(email == ''){
        document.getElementById('taMeeting').textContent = 'email is required';
        document.forms.meetingForm.email.focus();
        return false;
    }
    let at = email.indexOf('@');
    let dot = email.lastIndexOf('.');
    if(at < 1 || (dot -at < 2) ){
        console.log(sessionStorage.getItem('aPos'))
        document.getElementById('taMeeting').textContent = 'enter correct email format';
        document.forms.meetingForm.email.focus();
        return false;
    }
    //validate title
    let title = document.getElementById('meetingTitle').value
    if(title == ''){
        document.getElementById('taMeeting').textContent = 'Meeting Title is required';
        document.forms.meetingForm.meetingTitle.focus();
        return false;
    }
    submitForm(ev)
    return true;
}

