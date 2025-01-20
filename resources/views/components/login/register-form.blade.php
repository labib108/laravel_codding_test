<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                <div class="card-body">
                    <h4>Register</h4>
                    <br/>
                    <input id="name" placeholder="Name" class="form-control" type="text"/>
                    <br/>
                    <input id="email" placeholder="User Email" class="form-control" type="email"/>
                    <br/>
                    <input id="password" placeholder="User Password" class="form-control" type="password"/>
                    <br/>
                    <button onclick="SubmitRegister()" class="btn w-100 bg-gradient-primary">Submit</button>
                    <hr/>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

    async function SubmitRegister() {
        let name=document.getElementById('name').value;
        let email=document.getElementById('email').value;
        let password=document.getElementById('password').value;

        if(email.length===0){
            errorToast("Email is required");
        }
        else if(name.length===0){
            errorToast("Name is required");
        }
        else if(password.length===0){
            errorToast("Password is required");
        }
        else{
            // showLoader();
            let res=await axios.post("/register",{name:name,email:email, password:password});
            //hideLoader()
            if(res.status === 200 && res.data['status']==='success'){
                window.location.href="/";
            }
            else{
                errorToast(res.data['message']);
            }
        }
    }

</script>
