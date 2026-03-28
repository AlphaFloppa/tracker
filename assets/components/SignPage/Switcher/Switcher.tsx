import { useState } from 'react';
import styles from '../../../styles/SignPage/Switcher/.module.css';
import { ActiveMode } from '../SignPage';

type SwitcherPropsType = {
    currentMode: ActiveMode,
    setMode: (newMode: ActiveMode) => void
}

const Switcher = ({}) => {
    return (
        <div className = {styles.switcher}>
            <span 
                onClick={modeChangeHandler}
                className = {
                    `
                        ${styles.label}
                        ${
                            activeMode === 'register'
                            && styles.active
                        }
                    `
                }>
                Регистрация
            </span>
            <span 
                onClick={modeChangeHandler}
                className = {
                    `
                        ${styles.label}
                        ${
                            activeMode === 'login'
                            && styles.active
                        }
                    `
            }>
                Вход
            </span>
        </div>
    );
}

export{
    Switcher
}