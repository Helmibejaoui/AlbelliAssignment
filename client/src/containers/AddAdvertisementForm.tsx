import React from 'react';
import {FormProvider, SubmitHandler, useForm} from 'react-hook-form';
import FormInput from "../components/Form/FormInput";
import {Button} from "@mui/material";
import FormDatePicker from "../components/Form/FormDatePicker";

interface AddUserFormProps {
    onSubmit: SubmitHandler<any>;

}

const AddAdvertisementForm: React.FC<AddUserFormProps> = ({onSubmit}) => {
    const formMethods = useForm<any>();
    const {handleSubmit} = formMethods;

    return (
        <FormProvider {...formMethods}>
            <form onSubmit={handleSubmit(onSubmit)}>
                <FormInput name="firstname"/>
                <FormDatePicker name="date"/>
                <Button variant="contained" type="submit">Submit</Button>
            </form>

        </FormProvider>
    );
};

export default AddAdvertisementForm;