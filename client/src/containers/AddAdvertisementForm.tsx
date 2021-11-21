import React from 'react';
import {FormProvider, SubmitHandler, useForm} from 'react-hook-form';
import FormInput from "../components/Form/FormInput";
import {Button, Grid} from "@mui/material";
import FormDatePicker from "../components/Form/FormDatePicker";
import {FormAdvertisement} from "../model/Advertisement";
import Validators from "../Helpers/validators";

interface AddUserFormProps {
    onSubmit: SubmitHandler<FormAdvertisement>;
    defaultValues?: FormAdvertisement;

}

const AddAdvertisementForm: React.FC<AddUserFormProps> = ({onSubmit, defaultValues}) => {
    const formMethods = useForm<FormAdvertisement>({defaultValues});
    const {handleSubmit} = formMethods;
    return (
        <FormProvider {...formMethods}>
            <form onSubmit={handleSubmit(onSubmit)}>
                <Grid container spacing={2}>
                    <Grid item xs={12}>
                        <FormInput name="title" label="Title" validate={Validators([{ validation: 'required' }])}/>
                    </Grid>
                    <Grid item xs={12}>
                        <FormInput name="link" label="Link"
                                   validate={Validators([{ validation: 'required' },{validation:'link'}])}/>
                    </Grid>
                    <Grid item xs={12}>
                        <FormDatePicker name="validUntil" label="Valid Until" validate={Validators([{ validation: 'required' },{validation:'date'}])}/>
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