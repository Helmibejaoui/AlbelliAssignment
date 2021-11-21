import * as React from 'react';
import {useFormContext, Controller, RegisterOptions} from 'react-hook-form';
import {TextFieldClasses} from "@mui/material/TextField/textFieldClasses";
import AdapterDateFns from '@mui/lab/AdapterDateFns';
import LocalizationProvider from '@mui/lab/LocalizationProvider';
import DatePicker from "@mui/lab/DatePicker";
import {TextField} from "@mui/material";
import {toast} from "react-toastify";


interface IProps extends Omit<TextFieldClasses, 'errors' | 'onChange' | 'value' | 'root'> {
    name: string;
    label: string;
    validate?: RegisterOptions;
}

const FormDatePicker: React.FC<IProps> = ({name, label, validate, ...selectProps}) => {
    const {
        control,
        formState: {errors},
    } = useFormContext();
    return (
        <Controller
            name={name}
            rules={validate}
            control={control}
            defaultValue={new Date()}
            render={({field: {onChange, value}}) => (
                <>
                    <label className="label">{label}</label>
                    <LocalizationProvider dateAdapter={AdapterDateFns}>
                        <DatePicker
                            disablePast
                            {...selectProps}
                            onChange={onChange}
                            value={value}
                            inputFormat="dd/MM/yyyy"
                            renderInput={(params) => <TextField error={errors[name] !== undefined}
                                                                fullWidth {...params}/>
                            }

                        />
                    </LocalizationProvider>
                    <strong id="error-label">{errors[name]?.message}</strong>
                </>
            )}
        />
    );
};

export default FormDatePicker;