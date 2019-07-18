<table align="center" border="0" cellpadding="0" cellspacing="0" width="70%" style="border-collapse: collapse;">
    <tr>
        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
            Заказ автомобиля {{$auto->name}}
        </td>
    </tr>

    <tr>

        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
            <table border="1" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="width:30%;">
                        Автомобиль
                    </td>
                    <td>
                        {{$auto->name}}
                    </td>

                </tr>
                <tr>
                    <td>
                        Период
                    </td>
                    <td>
                        С {{$zakaz->datn}} по {{$zakaz->datk}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Фио
                    </td>
                    <td>
                        {{$zakaz->fio}}
                    </td>

                </tr>
                <tr>
                    <td>
                        Телефон
                    </td>
                    <td>
                        {{$zakaz->tel}}
                    </td>

                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        {{$zakaz->email}}
                    </td>

                </tr>
                <tr>
                    <td  style="padding: 20px 0 30px 0;">
                        Примечание
                    </td>
                    <td>
                        {{$zakaz->prim}}
                    </td>

                </tr>

            </table>
        </td>



    </tr>

</table>