<?

class html
{
	public $html = "";

	public function inicia_html($titulo = "Sem Titulo")
	{
		$this->html .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n\n";
		$this->html .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
		$this->html .= "<head>\n";
		$this->html .= "\t<title>$titulo</title>\n";
		$this->html .= "\t<meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-1\" />\n";
		$this->html .= "\t<meta http-equiv=\"generator\" content=\"classe pagina\" />\n";
		$this->html .= "\t<meta http-equiv=\"author\" content=\"Fabyo Guimaraes\" />\n";
		$this->html .= "\t<link rel=\"stylesheet\" href=\"css/estilo.css\" type=\"text/css\" />\n";
		$this->html .= "\t<script src=\"js/funcoes.js\" type=\"text/javascript\"></script>\n";
		$this->html .= "</head>\n\n";
		$this->html .= "<body>\n<br />";
		return $this->html;
	}

	public function termina_html()
	{
		$this->html .= "</body>\n";
		$this->html .= "</html>";
		echo $this->html;
	}

	public function inicia_form($nome = "", $action)
	{
		$this->html .= "<form name=\"$nome\" action=\"$action.php\" method=\"post\" enctype=\"application/x-www-form-urlencoded\">\n";
		return $this->html;
	}

	public function termina_form()
	{
		$this->html .= "<div><input name=\"submit\" type=\"submit\"  id=\"submit\"  class=\"botao\" value=\"Enviar\" /></div>\n";
		$this->html .= "</form>\n";
		return $this->html;
	}

	public function campo_form($nome, $tipo = "text", $value = "", $max = "", $size="")
	{
		$nome = strtolower(trim(strip_tags($nome)));
		if($tipo != "hidden")
		{
			$this->html .= "<div><label for=\"$nome\">".ucfirst($nome)."</label></div>\n";
		}
		$this->html .= "<div><input type=\"$tipo\" value=\"$value\" name=\"$nome\" id=\"$nome\" maxlength=\"$max\" size=\"$size\" /></div>\n";
		return $this->html;
	}

	public function inicia_select($nome)
	{
		if($nome == "Data")
		{
			$this->html .= "<br /><label for=\"dia\">Dia</label>\n ";
			$this->html .= "<select name=\"dia\" id=\"dia\" >\n";
			for($i = 1; $i <= 31 ; $i++)
			{
				$this->html .= "\t<option value=\"$i\">".sprintf("%02d", $i)."</option>\n";
			}
			$this->html .= "</select>\n";

			$this->html .= "<label for=\"mes\">Mes</label>\n ";
			$this->html .= "<select name=\"mes\" id=\"mes\" >\n";

			for($i = 1; $i <= 12 ; $i++)
			{
				$this->html .= "\t<option value=\"$i\">".sprintf("%02d", $i)."</option>\n";
			}
			$this->html .= "</select>\n";

			$this->html .= "<label for=\"ano\">Ano</label>\n ";
			$this->html .= "<select name=\"ano\" id=\"ano\" >\n";

			for($i = 1930; $i <= 1990 ; $i++)
			{
				$this->html .= "\t<option value=\"$i\">$i</option>\n";
			}
			$this->html .= "</select>\n<br /><br />";
		}
		else
		{
			$this->html .= "<div><label for=\"$nome\">".ucfirst($nome)."</label></div>\n";
			$this->html .= "<div><select name=\"$nome\" id=\"$nome\" >\n";

			if($nome == "Estados")
			{
				$this->html .= "\t<option value=\"selecione\" selected=\"selected\">Selecione</option>\n";
				$this->html .= "\t<option value=\"ac\">Acre</option>\n";
				$this->html .= "\t<option value=\"al\">Alagoas</option>\n";
				$this->html .= "\t<option value=\"am\">Amazonas</option>\n";
				$this->html .= "\t<option value=\"ap\">Amapá</option>\n";
				$this->html .= "\t<option value=\"ba\">Bahia</option>\n";
				$this->html .= "\t<option value=\"ce\">Ceará</option>\n";
				$this->html .= "\t<option value=\"df\">Distrito Federal</option>\n";
				$this->html .= "\t<option value=\"es\">Espírito Santo</option>\n";
				$this->html .= "\t<option value=\"go\">Goiás</option>\n";
				$this->html .= "\t<option value=\"ma\">Maranhão</option>\n";
				$this->html .= "\t<option value=\"mg\">Minas Gerais</option>\n";
				$this->html .= "\t<option value=\"ms\">Mato Grosso do Sul</option>\n";
				$this->html .= "\t<option value=\"mt\">Mato Grosso</option>\n";
				$this->html .= "\t<option value=\"pa\">Pará</option>\n";
				$this->html .= "\t<option value=\"pb\">Paraíba</option>\n";
				$this->html .= "\t<option value=\"pe\">Pernambuco</option>\n";
				$this->html .= "\t<option value=\"pi\">Piauí</option>\n";
				$this->html .= "\t<option value=\"pr\">Paraná</option>\n";
				$this->html .= "\t<option value=\"rj\">Rio de Janeiro</option>\n";
				$this->html .= "\t<option value=\"rn\">Rio Grande do Norte</option>\n";
				$this->html .= "\t<option value=\"ro\">Rondônia</option>\n";
				$this->html .= "\t<option value=\"rr\">Rorâima</option>\n";
				$this->html .= "\t<option value=\"rs\">Rio Grande do Sul</option>\n";
				$this->html .= "\t<option value=\"sc\">Santa Catarina</option>\n";
				$this->html .= "\t<option value=\"se\">Sergipe</option>\n";
				$this->html .= "\t<option value=\"sp\">São Paulo</option>\n";
				$this->html .= "\t<option value=\"to\">Tocantins</option>\n";
			}
		}

		return $this->html;
	}

	public function termina_select()
	{
		$this->html .= "</select>\n</div>\n";
		return $this->html;
	}

	public function campo_select($campo, $valor)
	{
		$this->html .= "<option value=\"selecione\" selected=\"selected\">Selecione</option>\n";
		$this->html .= "<option value=\"$valor\">$campo</option>\n";
		return $this->html;
	}

	public function link($link)
	{
		$link_nome   = eregi_replace(" +", " ", $link);
		$link        = eregi_replace(" +", " ", $link);
		$link        = str_replace(" ", "_", $link);
		$this->html .= "<div><a href=\"".strtolower($link).".php\" title=\"".ucwords(strtolower($link_nome))."\">".ucwords($link_nome)."</a></div><br />\n";
		return $this->html;
	}
}

?>