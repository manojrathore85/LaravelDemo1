<template>
<div class="card">
    <div class="card-header">
        <h5>Register user</h5>
    </div>
    <Form @submit="createUser" :validation-schema="createSchema" v-slot="{errors}"  > 
    <div class="card-body">
        <div class="col-md-12">
            <label for="firstname" class="form-label">First Name</label>
            <Field name="firstname" class="form-control" :class="{'is-invalid':errors.firstname}"/>
            <span class="invalid-feedback">{{ errors.firstname }}</span>
        </div>
        <div class="col-md-12">
            <label for="lastname" class="form-label">Last Name</label>
            <Field name="lastname" class="form-control" :class="{'is-invalid':errors.lastname}"/>
            <span class="invalid-feedback">{{ errors.lastname }}</span>
        </div>
        <div class="col-md-12">
            <label for="email" class="form-label">Email Name</label>
            <Field name="email" class="form-control" :class="{'is-invalid':errors.email}"/>
            <span class="invalid-feedback">{{ errors.email }}</span>
        </div>
        <div class="col-md-12">
            <label for="password" class="form-label">Passwprd </label>
            <Field name="password" class="form-control" :class="{'is-invalid':errors.password}"/>
            <span class="invalid-feedback">{{ errors.password }}</span>
        </div>
        <div class="col-md-12">
            <label for="c_password" class="form-label">Confirm Password</label>
            <Field name="c_password" class="form-control" :class="{'is-invalid':errors.c_password}"/>
            <span class="invalid-feedback">{{ errors.c_password }}</span>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</Form>
</div>
</template>
<script setup>
    import axios from 'axios';
    import {ref, onMounted, reactive} from 'vue';
    import {Form, Field } from 'vee-validate';
    import * as yup from 'yup';
    import { useToast } from 'vue-toastification';

    const toast = useToast();
    const users = ref([]);

    const createUser = (values, {resetForm}) => {
        console.log(values);
        axios.post('register', values).then((response) => {
            resetForm();
            toast.success('User Has Been Registered');
            
        });
        
    }
    const createSchema = yup.object({
        firstname:yup.string().required(),
        lastname:yup.string().required(),
        email:yup.string().required().email(),
        password:yup.string().required().min(8).max(16),
        c_password:yup.string().oneOf([yup.ref('password'), null], 'Passwords must match'),
        
    })
 
</script>