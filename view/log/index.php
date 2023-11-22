{{ include('header.php', {title: 'Journal de bord'}) }}


<body>
    <main>
        <h1>Journal de Bord</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Action</th>
                    <th>Détails</th>
                    <th>IP</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                {% for log in logs %}
                    <tr>
                        <td>{{ log.id }}</td>
                        <td>{{ log.user_id }}</td>
                        <td>{{ log.action }}</td>
                        <td>{{ log.details }}</td>
                        <td>{{ log.ip_address }}</td>
                        <td>{{ log.timestamp }}</td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </main>
</body></html>
