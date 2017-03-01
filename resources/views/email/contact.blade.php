<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>New Contact</title>
</head>
<body>
    <p>Có thông tin liên hệ mới:</p>
    <table class="table table-hover">
    	<tbody>
    		<tr>
    			<td>Email</td>
                <td>{{ $info['email'] }}</td>
    		</tr>
            <tr>
                <td>Name</td>
                <td>{{ $info['name'] }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $info['phone'] }}</td>
            </tr>
            <tr>
                <td>Content</td>
                <td>{{ $info['content'] }}</td>
            </tr>
    	</tbody>
    </table>
</body>
</html>
