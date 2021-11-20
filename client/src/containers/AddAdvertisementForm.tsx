import React from 'react';
import {FormProvider, SubmitHandler, useForm} from 'react-hook-form';
import FormInput from "../components/Form/FormInput";
import {Button, Grid} from "@mui/material";
import FormDatePicker from "../components/Form/FormDatePicker";
import {FormAdvertisement} from "../model/Advertisement";

interface AddUserFormProps {
    onSubmit: SubmitHandler<FormAdvertisement>;
    defaultValues?:FormAdvertisement;

}

const AddAdvertisementForm: React.FC<AddUserFormProps> = ({onSubmit,defaultValues}) => {
    const formMethods = useForm<FormAdvertisement>({defaultValues});
    const {handleSubmit} = formMethods;
    return (
        <FormProvider {...formMethods}>
            <form onSubmit={handleSubmit(onSubmit)}>
                <Grid container spacing={2}>
                    <Grid item xs={12}>
                        <FormInput name="title" label="Title" />
                    </Grid>
                    <Grid item xs={12}>
                        <FormInput name="link" label="Link"/>
                    </Grid>
                    <Grid item xs={12}>
                        <FormDatePicker name="validUntil" label="Date"/>
                    </Grid>
                    <Grid item xs={12}>
                        <Button variant="contained" type="submit">Submit</Button>
                    </Grid>

                </Grid>
            </form>

        </FormProvider>
    );
};

export default AddAdvertisementForm;