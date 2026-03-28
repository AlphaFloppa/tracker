import { useRef } from 'react';
import styles from '../../../styles/SignPage/LoginForm/.module.css'; 
import { useLogin } from './Form.effect';

const Form = () => {
    const formRef = useRef<HTMLFormElement | null>(null);
    useLogin({formRef});
    return (
        <form 
            ref = {formRef}
            className={styles.form}
            action='/login'
        >
            <div 
                className = {styles.inputsContainer}>
                <input 
                    placeholder="Электронная почта" 
                    required 
                    type = 'email' 
                    name='_username'
                    className={styles.input} 
                />
                <input 
                    placeholder="Пароль" 
                    required 
                    type = 'text' 
                    name='_password'
                    className={styles.input} 
                />
            </div>

            <button 
                type="submit" 
                className={styles.submit}
            >
                Войти
            </button>
        </form>
    );
}

export{
    Form
}