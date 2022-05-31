<?php
/**
 * Wrapper degli oggetti PHP per l'implementazione delle API HTTP
 * */
//indirizzo mail a cui mandare ordini e ritiro merci
 $mailAddress = "bot@bot.it";
		
// Richieste in POST
if( isset($_REQUEST['op']) )
{	
	
	if( isset($_POST['op']) )
	{
		//
		// Richieste in POST
		//
		switch($_POST['op'])
		{		 
				
			//
			// Invio mail nuovo ordine
			// @param who chi ha fatto l'ordine
			// @param when quando ha fatto l'ordine
			// @param payMode tipo di pagamento
			// @param howMuch importo pagato
			// @return { rsp: ok} oppure {rsp: err, desc: <descrizione errore>}
			case 'sendOrder':
			{
				if(isset($_POST['who']) && isset($_POST['when']) && isset($_POST['payMode']) && isset($_POST['howMuch']))
				{					
                    $headers = "FROM: Company <info@company.it>\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    
                    $oggetto = "Nuovo ordine effettuato";
                    
                    $message = "<img src='' width='10%'></center><br/><br/>Il giorno ".date('d/m/Y', $_POST['when']). " è stato effettuato un ordine da ".$_POST["who"]." pagato con ".$_POST["payMode"]." di valore ".$_POST["howMuch"]." €";

					mail($mailAddress,$oggetto,$message,$headers);

                    header('Content-Type: application/json');
                    echo json_encode(array('rsp' => 'ok'));
                    
                    error_log("Message sent");

					} catch (Exception $e) {						
						error_log("Error sending mail" . $mail->ErrorInfo);
						
						header('Content-Type: application/json');
						echo json_encode(array('rsp' => 'err', 'desc' => $mail->ErrorInfo));
					}
				}
				else
				{
					header('Content-Type: application/json');
					echo json_encode(array('rsp' => 'err', 'desc' => "Missing parameters"));
				}
				break;
			}

            //
			// Invio mail ritiro merce
			// @param who chi ha fatto l'ordine
			// @param when quando ha fatto l'ordine
			// @param sender mittente della merce
            // @param fattura fattura presente o no
            // @param ddt ddt presente o no
			// @param howMuch importo pagato
			// @return { rsp: ok} oppure {rsp: err, desc: <descrizione errore>}
			case 'sendPickData':
                {
                    if(isset($_POST['who']) && isset($_POST['when']) && isset($_POST['sender']) && isset($_POST['howMuch']) && isset($_POST['fattura']) && isset($_POST['ddt']))
                    {					
                        $headers = "FROM: Company <info@company.it>\r\n";
                        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                        
                        $oggetto = "Ritiro merce effettuato";
                        
                        $message = "<img src='' width='10%'></center><br/><br/>Il giorno ".date('d/m/Y', $_POST['when']). " è stato effettuato un ritiro merce da ".$_POST["who"]." il cui mittente era ".$_POST["sender"].".";
                        $message .= "<br/>";
                        $message .= ($_POST['fattura']=="fatturaYes" ? "Fattura presente" : "Fattura non presente");
                        $message .= "<br/>";
                        $message .= ($_POST['ddt']=="ddtYes" ? "DDT presente" : "DDT non presente");
                        $message .= "<br/>";
                        $message .= ($_POST['howMuch']!="" ? "Importo pagato:".$_POST['howMuch']." €" : "");
                        mail($mailAddress,$oggetto,$message,$headers);
    
                        header('Content-Type: application/json');
                        echo json_encode(array('rsp' => 'ok'));
                        
                        error_log("Message sent");
    
                        } catch (Exception $e) {						
                            error_log("Error sending mail" . $mail->ErrorInfo);
                            
                            header('Content-Type: application/json');
                            echo json_encode(array('rsp' => 'err', 'desc' => $mail->ErrorInfo));
                        }
                    }
                    else
                    {
                        header('Content-Type: application/json');
                        echo json_encode(array('rsp' => 'err', 'desc' => "Missing parameters"));
                    }
                    break;
                }
								 
			//
			// Richiesta sconosciuta
			default:
				header('Content-Type: application/json');
				echo json_encode(array('rsp' => 'err'));
		}	
	}
	else
	{
		
		
		
	}
}

?>
