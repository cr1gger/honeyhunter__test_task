document.querySelector('#contactForm').addEventListener('submit', (e) => {
    e.preventDefault();

    $.ajax({
        url: '/api/messages',
        method: 'POST',
        data: {
            name: e.target.elements.name.value,
            email: e.target.elements.email.value,
            message: e.target.elements.comment.value
        },
        type: 'JSON',
        success: (result) => {
            if (result.status)
            {
                let messageData = result?.addons?.[0]?.message;
                if ( messageData && messageData !== 'undefined')
                {
                    messageData = {
                        name: messageData.name,
                        email: messageData.email,
                        message: messageData.message
                    }
                } else {
                    messageData = {
                        name: e.target.elements.name.value,
                        email: e.target.elements.email.value,
                        message: e.target.elements.comment.value
                    }
                }
                $('#messages').prepend(`
                    <div class="col-md-3 col-lg-3 comment-container">
                        <div class="comment-header">${messageData.name}</div>
                        <div class="comment-body">
                            <p>${messageData.email}</p>
                            <p>${messageData.message}</p>
                        </div>
                    </div>
                `)
                toastr.success(result.message);
            } else toastr.error(result.message);
        },
        error: (error) => {
            toastr.error('На сервере произошла ошибка, приносим свои извинения =(');
        }
    })
})