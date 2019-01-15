        <h1>Create an account</h1>
        <form action="/registration" method="post">
            <table>
                <tr>
                    <td><input type="text" name="first_name" placeholder="First name" value=""/></td>
                </tr>

                <tr>
                    <td><input type="text" name="last_name"  placeholder="Last name" value=""/></td>
                </tr>

                <tr>
                    <td  class="email_input">
                        <input type="text" name="email" placeholder="Enter your Email address" value=""/>
                    </td>
                </tr>

                <tr>
                    <td class="gender">Gender</td>

                    <td  class="gender_male">
                        Male<input type="radio" name="gender" value="male"  />
                    </td>

                    <td class="gender_female">
                        Female<input type="radio" name="gender" value="female" />
                    </td>
                </tr>

                <tr>
                    <td><input type="text" name="username" placeholder="Username" value=""/></td>
                </tr>

                <tr>
                    <td><input type="password" name="password" placeholder="Password" value=""/></td>
                </tr>

                <tr>
                    <td><input type="password" name="confirm_password" placeholder="Confirm password" value=""/></td>
                </tr>

                <tr>
                    <td class="check_in_input"><input type="submit" name="Check in" value="Check in"/></td>
                    <td class="reset_input"><input type="reset" value="Reset" /></td>
                </tr>
            </table>

        </form>
