import styles from '../../../styles/SignPage/RegisterForm/.module.css';

const Form = () => {
    return (
        <form
            className={styles.form}
            action='/register'
        >
            <input 
                type = 'text'
                placeholder = 'ФИО ребенка'
                name = 'fullName'
                className={styles.input} 
            />
            <input 
                type = 'text'
                placeholder = 'ФИО родителя'
                name = 'parentFullName'
                className={styles.input} 
            />
            <div className={styles.horizontalContainer}>
                <select name="class" id="class">
                    <option value="">Класс поступления</option>
                    <option value="1">1 класс</option>
                    <option value="2">2 класс</option>
                    <option value="3">3 класс</option>
                    <option value="4">4 класс</option>
                    <option value="5">5 класс</option>
                    <option value="6">6 класс</option>
                    <option value="7">7 класс</option>
                    <option value="8">8 класс</option>
                    <option value="9">9 класс</option>
                    <option value="10">10 класс</option>
                    <option value="11">11 класс</option>
                </select>

                <input 
                    type = 'tel'
                    placeholder="Номер телефона"
                    name = 'phone'
                    className={styles.input} 
                />

                <input 
                    type = 'email'
                    placeholder="Электронная почта"
                    name = 'email'
                    className={styles.input} 
                />

                <input 
                    type = 'text'
                    placeholder="Пароль"
                    name = 'password'
                    className={styles.input} 
                />

                <button 
                    type="submit" 
                    className={styles.submit}
                >
                    Зарегистрироваться
                </button>
            </div>
        </form>
    );
}