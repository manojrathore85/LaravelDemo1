<template>
    <div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div v-if="successMessage" class="success-message">{{ successMessage }}</div>
    			<div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign Up</h3>
										<p>Already have an account? <a href="authentication-signin.html">Sign in here</a>
										</p>
									</div>
									<div class="d-grid">
										<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                          <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
                          <span>Sign Up with Google</span>
											</span>
										</a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign Up with Facebook</a>
									</div>
									<div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-3" @submit.prevent="onSignup()">
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">First Name</label>
												<input type="text" class="form-control" id="inputFirstName" v-model="firstname" placeholder="Jhon">
                                                <span class="text-danger" v-if="error.firstname">{{ error.firstname }}</span>
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Last Name</label>
												<input type="text" class="form-control" id="inputLastName" v-model="lastname" placeholder="Deo">
                                                <span class="text-danger" v-if="error.lastname">{{ error.lastname }}</span>

											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="inputEmailAddress" v-model="email"  placeholder="example@user.com">
                                                <span class="text-danger" v-if="error.email">{{ error.email }}</span>

											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" v-model="password" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    <span class="text-danger" v-if="error.password">{{ error.password }}</span>

												</div>
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Country</label>
												<select class="form-select" id="inputSelectCountry" aria-label="Default select example">
													<option selected>India</option>
													<option value="1">United Kingdom</option>
													<option value="2">America</option>
													<option value="3">Dubai</option>
												</select>
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
</template>
<script>
import { mapState } from 'vuex';
import validation from '../services/validation';
import { mapActions } from 'vuex';
import {ACTION_SIGNUP} from '../store/storeconstants';
import { useToast } from 'vue-toastification';
//import { handleError } from "../services/handleError";

// Utility function to flatten arrays
function flattenArray(arr) {
    let result = [];
    arr.forEach(item => {
        if (Array.isArray(item)) {
            result = result.concat(flattenArray(item));
        } else {
            result.push(item);
        }
    });
    return result;
}
export default {
    name:'Signup',
    data(){
        return {
            firstname:'',
            lastname:'',
            email:'',
            password:'',
            state:'',
			successMessage: '',
      		errorMessage: '',
            error:[],
			toast:useToast,
        };
    },    
    methods:{
		...mapActions('auth',[ACTION_SIGNUP]),
		async signup() {
		try {
			const payload = {
			firstname: this.firstname,
			lastname: this.lastname,
			email: this.email,
			password: this.password,
			};
			const response = await this[ACTION_SIGNUP](payload);
			toast.success('Signup successful!');
			console.log(response); // Handle the response data if needed
		} catch (error) {	

			// const { message, validationErrors } = handleError(error);
            //     if (validationErrors && validationErrors.Length > 0 ) {
            //         Object.values(validationErrors).forEach(errors => {
            //             errors.forEach(err => {
            //                 toast.error(err);
            //             });
            //         });
            //     } else {
			// 		const messages = Array.isArray(message) ? flattenArray(message) : [message];
            //         messages.forEach(msg => {
            //             toast.error(msg);
            //         });
            //     }
			console.log(error);
		}
		},
        onSignup(){
            //let validation = new validation();
            this.error= [];
            //console.log(validation.checkEmail(this.email));

            if(!validation.checkEmail(this.email)){
                this.error['email'] = 'Email is not valid' 
            }
            if(!validation.minLength(this.firstname,6)){
                this.error['firstname'] = 'Name should be at least 6 charactor'
            }
            if(!validation.minLength(this.lastname,6)){
                this.error['lastname'] = 'Last Name should be at least 6 charactor'
            }
            if(!validation.minLength(this.password,6)){
                this.error['password'] = 'Password should be at least 6 charactor'
            }
            if( 'email' in this.error || 'password' in this.error){
                console.log(this.error);
                return false;
            }
            console.log("validation passed");
			//{email:this.email, password:this.password, firstname:this.firstname, lastname:this.lastname }
            this.signup();

            
        }

    }
};
</script>