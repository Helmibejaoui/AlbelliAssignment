import * as React from 'react';
import { useFormContext, Controller } from 'react-hook-form';
import {TextField} from "@mui/material";
import {TextFieldClasses} from "@mui/material/TextField/textFieldClasses";


interface IProps extends Omit<TextFieldClasses , 'errors' | 'onChange' | 'value' | 'root'> {
    name: string;
}

const FormInput: React.FC<IProps> = ({ name, ...selectProps }) => {
    const {
        control,
        formState: { errors },
    } = useFormContext();
    return (
        <Controller
            name={name}
            rules={{ required: true }}
            control={control}
            defaultValue=""
            render={({ field: { onChange, value } }) => (
                <TextField
                    {...selectProps}
                    onChange={onChange}
                    value={value}
                />
            )}
        />
    );
};

export default FormInput;