 import { signInWithGoogle, signInWithFacebook } from '../../modules/auth.js';
        const signinPanel = document.getElementById('signinPanel');
        const signupPanel = document.getElementById('signupPanel');
        const signupBtn = document.getElementById('signupBtn');
        const signinBtn = document.getElementById('signinBtn');
        const signinBtn1 = document.getElementById('signinBtn1');
        const forgotpasswordPanel = document.getElementById('forgotpasswordPanel');
        const forgotpasswordBtn = document.getElementById('forgotpasswordBtn');
        const forgotpasswordPanel1 = document.getElementById('forgotpasswordPanel1');
        const signinBtn2 = document.getElementById('signinBtn2');
        const forgotpasswordPanel2 = document.getElementById('forgotpasswordPanel2');
        const signinBtn3 = document.getElementById('signinBtn3');
        const googleBtns = document.querySelectorAll('.googleBtn');
        const facebookBtns = document.querySelectorAll('.facebookBtn');

        googleBtns.forEach(button => {
            button.addEventListener('click', function(){
                signInWithGoogle();
            })
        })

        facebookBtns.forEach(button => {
            button.addEventListener('click', function(){
                signInWithFacebook();
            })
        })

        twoPanelTransition(signinPanel, signupPanel, signupBtn);
        twoPanelTransition(signupPanel, signinPanel, signinBtn);
        twoPanelTransition(forgotpasswordPanel, signinPanel, signinBtn1);
        twoPanelTransition(signinPanel, forgotpasswordPanel, forgotpasswordBtn);
        twoPanelTransition(forgotpasswordPanel1, signinPanel, signinBtn2);
        twoPanelTransition(forgotpasswordPanel2, signinPanel, signinBtn3);
        
        function twoPanelTransition(panel1, panel2, button){
            button.addEventListener('click', function(event){
            event.preventDefault();
            panel1.classList.add('fadeOut');
            setTimeout(() => {
                panel1.classList.add('d-none');
                panel1.classList.remove('fadeOut');
                panel2.classList.remove('d-none');
                panel2.classList.add('fadeIn');
                setTimeout(() => {
                    panel2.classList.remove('fadeIn');
                }, 400);
            }, 400);
            
        });
        }

        const inputs = document.querySelectorAll(".code-input");

        inputs.forEach((input, index) => {
            input.addEventListener("input", (e) => {
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener("keydown", (e) => {
                if (e.key === "Backspace" && index > 0 && e.target.value === "") {
                    inputs[index - 1].focus();
                }
            });
        });
