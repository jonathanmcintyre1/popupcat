<?php defined('ALTUMCODE') || die() ?>

<?php ob_start() ?>
<script>
    /* Vcard Social Script */
    'use strict';

    /* add new */
    let vcard_social_add = event => {
        let clone = document.querySelector(`#template_vcard_social`).content.cloneNode(true);
        let count = document.querySelectorAll(`[id="vcard_socials"] .mb-4`).length;

        if(count >= 20) return;

        clone.querySelector(`input[name="vcard_social_label[]"`).setAttribute('name', `vcard_social_label[${count}]`);
        clone.querySelector(`input[name="vcard_social_value[]"`).setAttribute('name', `vcard_social_value[${count}]`);

        document.querySelector(`[id="vcard_socials"]`).appendChild(clone);

        vcard_social_remove_initiator();
    };

    document.querySelectorAll('[data-add="vcard_social"]').forEach(element => {
        element.addEventListener('click', vcard_social_add);
    })

    /* remove */
    let vcard_social_remove = event => {
        event.currentTarget.closest('.mb-4').remove();
    };

    let vcard_social_remove_initiator = () => {
        document.querySelectorAll('[id^="vcard_socials_"] [data-remove]').forEach(element => {
            element.removeEventListener('click', vcard_social_remove);
            element.addEventListener('click', vcard_social_remove)
        })
    };

    vcard_social_remove_initiator();
</script>

<script>
    'use strict';

    /* Type handler */
    let type_handler = (selector, data_key) => {
        let type = document.querySelector(selector).value;

        document.querySelectorAll(`[${data_key}]:not([${data_key}="${type}"])`).forEach(element => {
            element.classList.add('d-none');
            let input = element.querySelector('input,select,textarea');

            if(input) {
                input.setAttribute('disabled', 'disabled');
                if(input.getAttribute('required')) {
                    input.setAttribute('data-is-required', 'true');
                }
                input.removeAttribute('required');
            }
        });

        document.querySelectorAll(`[${data_key}="${type}"]`).forEach(element => {
            element.classList.remove('d-none');
            let input = element.querySelector('input,select,textarea');

            if(input) {
                input.removeAttribute('disabled');
                if(input.getAttribute('data-is-required')) {
                    input.setAttribute('required', 'required')
                }
            }
        });
    }

    type_handler('select[name="type"]', 'data-type');
    document.querySelector('select[name="type"]') && document.querySelector('select[name="type"]').addEventListener('change', () => { type_handler('select[name="type"]', 'data-type') });

    type_handler('select[name="foreground_type"]', 'data-foreground-type');
    document.querySelector('select[name="foreground_type"]') && document.querySelector('select[name="foreground_type"]').addEventListener('change', () => { type_handler('select[name="foreground_type"]', 'data-foreground-type') });

    type_handler('select[name="custom_eyes_color"]', 'data-custom-eyes-color');
    document.querySelector('select[name="custom_eyes_color"]') && document.querySelector('select[name="custom_eyes_color"]').addEventListener('change', () => { type_handler('select[name="custom_eyes_color"]', 'data-custom-eyes-color') });


    /* On change regenerated qr */
    let delay_timer = null;

    document.querySelectorAll('[data-reload-qr-code]').forEach(element => {
        ['change', 'paste', 'keyup'].forEach(event_type => element.addEventListener(event_type, event => {
            /* Add the preloader, hide the QR */
            document.querySelector('#qr_code').classList.add('qr-code-loading');

            /* Disable the submit button */
            document.querySelector('button[type="submit"]').classList.add('disabled');
            document.querySelector('button[type="submit"]').setAttribute('disabled','disabled');

            clearTimeout(delay_timer);

            delay_timer = setTimeout(() => {

                /* Send the request to the server */
                let form = document.querySelector('form');
                let form_data = new FormData(form);

                let notification_container = form.querySelector('.notification-container');
                notification_container.innerHTML = '';

                fetch(`${url}qr-code-generator`, {
                    method: 'POST',
                    body: form_data,
                })
                    .then(response => response.ok ? response.json() : Promise.reject(response))
                    .then(data => {
                        if(data.status == 'error') {
                            display_notifications(data.message, 'error', notification_container);
                        }

                        else if(data.status == 'success') {
                            display_notifications(data.message, 'success', notification_container);

                            document.querySelector('#qr_code').src = data.details.data;
                            document.querySelector('#download').href = data.details.data;
                            document.querySelector('input[name="qr_code"]').value = data.details.data;

                            /* Hide the preloader, display the QR */
                            document.querySelector('#qr_code').classList.remove('qr-code-loading');

                            /* Enable the submit button */
                            document.querySelector('button[type="submit"]').classList.remove('disabled');
                            document.querySelector('button[type="submit"]').removeAttribute('disabled');
                        }
                    })
                    .catch(error => {});

            }, 750);
        }));
    });

    <?php if(isset($_GET['name'])): ?>
    document.querySelector('select[name="type"]').dispatchEvent(new Event('change'));
    document.querySelector('input[name="reload"]').dispatchEvent(new Event('change'));
    <?php endif ?>
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>
