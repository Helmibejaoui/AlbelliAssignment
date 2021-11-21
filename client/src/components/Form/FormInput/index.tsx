import * as React from 'react';
import {useFormContext, Controller, RegisterOptions} from 'react-hook-form';
import {TextField} from "@mui/material";
import {TextFieldClasses} from "@mui/material/TextField/textFieldClasses";
import {toast} from "react-toastify";


interface IProps extends Omit<TextFieldClasses, 'errors' | 'onChange' | 'value' | 'root'> {
    name: string;
    label: string;
    validate?: RegisterOptions;
}

const FormInput: React.FC<IProps> = ({name, label, validate, ...selectProps}) => {
    const {
        control,
        formState: {errors},
    } = useFormContext();
    return (
        <div>
            <Controller
                name={name}
                rules={validate}
                control={control}
                defaultValue=""
                render={({field: {onChange, value}}) => (
                    <div>
                        <label className="label">{label}</label>
                        <TextField
                            fullWidth
                            {...selectProps}
                            onChange={onChange}
                            value={value}
                            error={errors[name] !== undefined}
                        />
                        <strong id="error-label">{errors[name]?.message}</strong>
                    </div>
                )}
            />
        </div>
    );
};

export default FormInput;