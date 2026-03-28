import { Form } from "./LoginForm/Form";
import { Switcher } from "./Switcher/Switcher";
import styles from '../../styles/SignPage/.module.css';
import { useState } from "react";

type ActiveMode = 'register' | 'login';

const SignPage = () => {
    const [activeMode, setActiveMode] = useState<ActiveMode>('login');
    const toggleActiveMode = () => {
        if(activeMode === 'login'){
            setActiveMode('register');
        } else {
            setActiveMode('login');
        }
    }
    const modeChangeHandler = ({currentTarget}: React.MouseEvent) => {
        if(currentTarget.classList.contains('active')){
            return;
        }

        toggleActiveMode();
    }
    return (
        <div className={styles.mainContainer}>

            <div className={styles.pic}>
            </div>

            <div className={styles.panel}>
                <div className={styles.infoContainer}>
                    <h1 
                        className={styles.header}
                    >
                        Зайти на портал
                    </h1>
                    <p
                        className={styles.text}
                    >
                        Это место, где можно узнать все о поступлении, прикрепить электронные документы и отслеживать прохождение этапов поступления
                    </p>
                </div>

                <Switcher />
                
                <Form />
            </div>

        </div>
    );
}

export {
    SignPage,
    type ActiveMode
}