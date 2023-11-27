<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
       <head>
        <title>Student Table</title>
         <style>
          table {
            text-align: center;
            border-collapse: collapse;
            width: auto;
          }
          th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
          }
        </style>
      </head>
      <body>
        <h2>Student Table</h2>
        <table>
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Major</th>
          </tr>
          <xsl:for-each select="students/student">
            <tr>
              <td><xsl:value-of select="name"/></td>
              <td><xsl:value-of select="age"/></td>
              <td><xsl:value-of select="gender"/></td>
              <td><xsl:value-of select="major"/></td>
            </tr>
          </xsl:for-each>
        </table>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
