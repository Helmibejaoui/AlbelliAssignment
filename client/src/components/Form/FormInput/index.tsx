import * as React from 'react';
import {useFormContext, Controller} from 'react-hook-form';
import {TextField} from "@mui/material";
import {TextFieldClasses} from "@mui/material/TextField/textFieldClasses";


interface IProps extends Omit<TextFieldClasses, 'errors' | 'onChange' | 'value' | 'root'> {
    name: string;
    label: string;
}

const FormInput: React.FC<IProps> = ({name, label, ...selectProps}) => {
    const {
        control,
        formState: {errors},
    } = useFormContext();
    return (
        <div>
            <Controller
                name={name}
                rules={{required: true}}
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
                            error={errors[name]!==undefined}
                        />
                    </div>
                )}
            />
        </div>
    );
};

export default FormInput;