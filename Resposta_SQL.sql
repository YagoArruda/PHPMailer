-- A)
SELECT nome_cliente as Nome, cpf_cliente as CPF, rg_cliente as RG, telmask_cliente as Telefone, email_cliente as Email_do_cliente FROM clientes;

-- B)
SELECT
clientes.nome_cliente as Nome, 
clientes_fotos.url_foto as Foto_do_perfil,
COUNT(compras.fk_id_cliente_clientes) as Quantidade_de_compras
FROM clientes
LEFT JOIN compras ON compras.fk_id_cliente_clientes = clientes.id_cliente AND sel_status_compra = "concluido"
LEFT JOIN clientes_fotos ON clientes_fotos.fk_id_cliente_clientes = clientes.id_cliente AND ordem_foto = 1
GROUP BY clientes.nome_cliente